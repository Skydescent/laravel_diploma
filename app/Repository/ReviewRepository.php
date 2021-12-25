<?php

namespace App\Repository;

use App\Contracts\Repository\ReviewRepositoryContract;
use App\Contracts\Service\AdminSettingsServiceContract;
use App\Models\Review;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ReviewRepository implements ReviewRepositoryContract
{
    private AdminSettingsServiceContract $adminsSettings;

    public function __construct(AdminSettingsServiceContract $adminsSettings)
    {
        $this->adminsSettings = $adminsSettings;
    }


    public function store(array $attributes): null|Review
    {
        return Review::create($attributes);
    }

    public  function getReviews(string $productId, int $count): Collection
    {
        return Review::where('product_id', $productId)->limit($count)->get();
    }

    public function getPaginatedReviews(
        string $productId,
        int $perPage,
        int $currentPage
    ): LengthAwarePaginator
    {
        $ttl = $this->adminsSettings->get('reviewTimeCache', 60 * 60 * 24);

       return Cache::tags(
            [
                'reviews',
                'products',
                'users',
            ])
            ->remember(
                'reviews:page=' . $currentPage .
                '|per_page='. $perPage .
                '|product_id=' . $productId,
                $ttl,
                function () use ($productId, $perPage, $currentPage) {
                    return Review::where('product_id', $productId)->with('user:id,name')
                    ->paginate(perPage: $perPage, page: $currentPage);
            });
    }
}