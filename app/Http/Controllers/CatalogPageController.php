<?php

namespace App\Http\Controllers;

use App\Contracts\Repository\CategoryRepositoryContract;
use App\Contracts\Repository\PriceRepositoryContract;
use App\Contracts\Repository\ProductRepositoryContract;
use App\Contracts\Repository\SellerRepositoryContract;
use App\Contracts\Service\Cart\AddCartServiceContract;
use App\Contracts\Service\CustomerServiceContract;
use App\Contracts\Service\Product\CompareProductsServiceContract;
use App\Contracts\Service\Product\ProductDiscountServiceContract;
use App\Http\Requests\CatalogGetRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Service\Discount\OtherDiscountService;
use Illuminate\Http\Request;

class CatalogPageController extends Controller
{
    public function index(
        ProductRepositoryContract      $repo,
        ProductDiscountServiceContract $discountRepo,
        OtherDiscountService $discountService,
        PriceRepositoryContract        $prices,
        SellerRepositoryContract       $sellers,
        CatalogGetRequest              $request
    )
    {
        $sellers = $sellers->getAllSellers();
        $products = $repo->getProductsForCatalogByCategory($request);
        $paginationLink = $products->links('components.pagination');
        $productDiscountPriceDTO = $discountService->getProductPriceDiscountDTOs($products);

        //$discounts = $discountRepo->getCatalogDiscounts(collect($products->items()));
        $minPrice = $prices->getMinPrice();
        $maxPrice = $prices->getMaxPrice();
        return view('catalog', compact(
            'paginationLink', 'productDiscountPriceDTO', 'sellers',
            'maxPrice', 'minPrice', 'request',
        ));
    }

    public function getProductForCatalogByCategorySlug(
        $slug,
        ProductRepositoryContract      $repo,
        ProductDiscountServiceContract $discountRepo,
        PriceRepositoryContract        $prices,
        CategoryRepositoryContract     $catRepo,
        CatalogGetRequest              $request
    )
    {
        $category = $catRepo->getCategoryBySlug($slug);
        $catIds = $repo->getProductsByCategory($category);
        $sellers = $repo->getSellersForProducts($category->id);
        $products = $repo->getProductsForCatalogByCategory($request, $category->slug);
        $discounts = $discountRepo->getCatalogDiscounts(collect($products->items()));
        $minPrice = $prices->getMinPriceForCategory($catIds);
        $maxPrice = $prices->getMaxPriceForCategory($catIds);
        return view('catalog', compact(
            'products', 'discounts', 'sellers',
            'maxPrice', 'minPrice', 'request',
        ));
    }

    public function addToCart(AddCartServiceContract $addToCart, ProductRepositoryContract $prodRepo, $slug)
    {
        $product = $prodRepo->find($slug);
        if ($addToCart->add($product, 1)) {
            return back()->with('success', __('catalog.success.product_add_cart'));
        } else {
            return back()->with('error', __('catalog.error.product_add_cart'));
        }
    }

    public function compare(
        CompareProductsServiceContract $compare,
        Product $product,
        CustomerServiceContract $customerService
    )
    {
        if ($compare->add($product, $customerService->getCustomer())) {
            return back()->with('success', __('catalog.success.product_add_compare'));
        } else {
            return back()->with('error', __('catalog.error.product_add_compare'));
        }
    }
}
