<?php

namespace App\Service;

use App\Contracts\Repository\CompareProductsRepositoryContract;
use App\Contracts\Repository\CustomerRepositoryContract;
use App\Contracts\Repository\OrderItemRepositoryContract;
use App\Contracts\Repository\ViewedProductsRepositoryContract;
use App\Contracts\Service\CustomerServiceContract;
use App\Models\Customer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class CustomerService implements CustomerServiceContract
{
    private $repository;

    public function __construct(CustomerRepositoryContract $repo)
    {
        $this->repository = $repo;
    }

    public function getCustomer(): Customer
    {
        if (Cookie::get('customer_token')) {
            if (auth()->user()) {
                if (auth()->user()->customer) {
                return Cache::tags(['customerService'])->remember(
                    'customerService_user_id_' . auth()->user()->id, 60 * 60 * 24, function () {
                    return auth()->user()->customer;
                });
                } else {
                    $this->repository->setUserId(Cookie::get('customer_token'), auth()->user()->id);
                    return $this->repository->getByHash(Cookie::get('customer_token'));
                }
            } else {
                return $this->repository->getByHash(Cookie::get('customer_token'));
            }
        } else {
            $customer = $this->repository->createCustomer();
            Cookie::queue('customer_token', $customer->hash);
            return $customer;
        }
    }

    public function getCustomerByHash($hash)
    {
        return $this->repository->getByHash($hash);
    }

    public function getCustomerHash(): string
    {
        return $this->getCustomer()->hash;
    }

    public function associateWithUser($userId)
    {
        return $this->repository->setUserId($this->getCustomerHash(), $userId);
    }


    public function associateCart(OrderItemRepositoryContract $orderItemRepo, $hash)
    {

        $cartCollection = $this->repository->getCustomerCartByHash($hash);
        $customerAuth = $this->getCustomer();
        $orderItemRepo->chengeCutomerId($cartCollection, $customerAuth->id);
    }

    public function associateComparedProducts(CompareProductsRepositoryContract $compareRepo, $hash)
    {
        $customerFromCookieId = $this->getCustomerByHash($hash)->id;
        $customerAuthId = $this->getCustomer()->id;
        $compareRepo->chengeCutomerId($customerAuthId, $customerFromCookieId);
    }

    public function associateViewedProducts(ViewedProductsRepositoryContract $viewedRepo, $hash)
    {
        $customerFromCookieId = $this->getCustomerByHash($hash)->id;
        $customerAuthId = $this->getCustomer()->id;
        $viewedRepo->chengeCutomerId($customerAuthId, $customerFromCookieId);
    }

    public function changeCookieHash($hash)
    {
        Cookie::queue('customer_token', $hash);
    }

    public function removeCustomerBuHash($hash)
    {
        $this->repository->removeCustomerByHash($hash);
    }

}
