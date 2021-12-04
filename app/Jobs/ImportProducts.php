<?php

namespace App\Jobs;

use App\Contracts\Service\Imports\DataReaderFactoryServiceContract;
use App\Contracts\Service\Product\ImportProductServiceContract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Orchid\Attachment\Models\Attachment;
use Orchid\Support\Facades\Toast;
use Symfony\Component\HttpFoundation\File\File;

class ImportProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Attachment $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ImportProductServiceContract $importService, DataReaderFactoryServiceContract $dataReader)
    {
        try {
            $importService->import( $dataReader->getReaderByFile(
                new File( Storage::disk($this->file->disk)->path($this->file->physicalPath()))
            ));

            $awaitFile = Storage::disk('import-await')->get($this->file->physicalPath());
            Storage::disk('import-success')->put( $this->file->path . $this->file->name . '.' .  $this->file->extension, $awaitFile);
            $this->file->update(['disk' => 'import-success']);
            Log::info('import success');
        } catch (\Exception $e) {
            $awaitFile = Storage::disk('import-await')->get($this->file->physicalPath());
            Storage::disk('import-error')->put( $this->file->path . $this->file->name . '.' .  $this->file->extension, $awaitFile);
            $this->file->update(['disk' => 'import-error']);
            Log::info('import error ' . $e->getMessage());
        }
    }

    public function fail()
    {

    }
}
