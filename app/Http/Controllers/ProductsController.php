<?php

namespace App\Http\Controllers;

use App\Contracts\Repository\ProductRepositoryContract;
use App\Contracts\Repository\ReviewRepositoryContract;
use App\Contracts\Service\AddReviewServiceContract;
use App\Contracts\Service\Cart\AddCartServiceContract;
use App\Contracts\Service\CustomerServiceContract;
use App\Contracts\Service\Discount\OtherDiscountServiceContract;
use App\Contracts\Service\FlashMessageServiceContract;
use App\Contracts\Service\Product\CompareProductsServiceContract;
use App\Contracts\Service\Product\ProductDiscountServiceContract;
use App\Contracts\Service\Product\ViewedProductsServiceContract;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsController extends Controller
{
    private ProductRepositoryContract $productRepository;
    private FlashMessageServiceContract $flashService;
    private ReviewRepositoryContract $reviewRepository;

    public function __construct(
        ProductRepositoryContract $productRepository,
        FlashMessageServiceContract $flashService,
        ReviewRepositoryContract $reviewRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->flashService = $flashService;
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param ProductDiscountServiceContract $discountService
     * @param string $slug
     * @return Application|Factory|View
     */
    public function show(
        OtherDiscountServiceContract $discountService,
        AddReviewServiceContract $reviewService,
        string $slug,
        ViewedProductsServiceContract $viewedProductsService
    ): Application|Factory|View
    {
        $product = $this->productRepository->find($slug);
        if (is_null($product)) abort(404);

        $productPriceDiscountDTO = $discountService->getProductPriceDiscountDTO($product);
        $reviewsCount = $reviewService->getReviewsCount($product);
        $reviews = $this->reviewRepository->getPaginatedReviews($product->id, 3, 1);

        $viewedProductsService->add($product);

        return view(
            'products.show',
                compact(
                    'productPriceDiscountDTO',
                    'reviewsCount',
                    'reviews'
                )
        );
    }

    public function addToCart
    (
        AddCartServiceContract $addToCartService,
        ViewedProductsServiceContract $viewedService,
        string $slug,
        Seller $seller = null
    ): RedirectResponse
    {
        $product = $this->productRepository->find($slug);
        $viewedService->add($product);
        $qty = request('amount');
        if (!is_numeric($qty) || $qty < 0) $qty = 1;

        if ($addToCartService->add($product, $qty, $seller)) {
            $this->flashService->flash(__('add_to_cart_service.on_success_msg'));
        } else {
            $this->flashService->flash(__('add_to_cart_service.on_error_msg'), 'danger');
        }
        return back();
    }

    public function addToComparison(
        CustomerServiceContract $customerService,
        CompareProductsServiceContract $compareService,
        string $slug
    ): RedirectResponse
    {
        $product = $this->productRepository->find($slug);

        if ($compareService->add($product, $customerService->getCustomer())) {
            $this->flashService->flash(__('add_to_comparison_service.on_add_success_msg'));
        } else {
            $this->flashService->flash(__('add_to_comparison_service.on_error_msg'), 'danger');
        }
        return back();
    }

    public function showReviews(Product $product): LengthAwarePaginator
    {
        $perPage = request('per_page')?: 3;
        $currentPage = request('current_page')?: 1;
        return $this->reviewRepository->getPaginatedReviews($product->id, $perPage, $currentPage);
    }
}
