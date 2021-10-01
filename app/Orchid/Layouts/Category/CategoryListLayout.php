<?php

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = '';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('id', 'ID')
                ->width('150')
                ->render(function (Category $category) {
                    dd($category);
                    "<img src='" . asset('assets/img/icons/departments/'. $category->icon . '.svg') . "
                              alt='{$category->name}'
                              class='mw-100 d-block img-fluid'>
                            <span class='small text-muted mt-1 mb-0'># {$category->id}</span>";
                }),

            TD::make('title', __('admin.category.title'))
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Category $category) {
                    return Link::make($category->name)
                        ->route('platform.category.edit', $category);
                }),


            TD::make('created_at', __('Created'))
                ->sort()
                ->render(function (Category $category) {
                    return $category->created_at;
                }),
            TD::make('updated_at', __('Last edit'))
                ->sort()
                ->render(function (Category $category) {
                    return $category->updated_at;
                }),
        ];
    }
}
