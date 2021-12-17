<?php

namespace App\Service;

use App\Contracts\Repository\OrderItemRepositoryContract;
use App\Contracts\Service\Cart\GetCartServiceContract;
use App\Contracts\Service\Discount\CartDiscountServiceContract;
use App\Contracts\Service\OrderServiceContract;
use App\DTO\CartItemDTO;
use App\Models\Order;
use Illuminate\Support\Collection;

class OrderService implements OrderServiceContract
{
    public function __construct(
        private CartDiscountServiceContract $discountService,
        private OrderItemRepositoryContract $orderItemRepository,
        private GetCartServiceContract      $cart,
        private DeliveryCostService $deliveryCostService,
        private Order $order
    )
    {
        $this->cart->setOrder($this->order);
    }

    public function getOrderItemsDTOs(): Collection
    {
        if ($this->order->payment?->payed_at != null) {
            return $this->getPaidOrderDTOs();
        }

        return $this->getUnpaidOrderDTOs();
    }

    public function addHistory()
    {
        $dtos = $this->getUnpaidOrderDTOs();
        $this->orderItemRepository->addHistoryPricesAndDiscounts($this->order,$dtos);

    }

    protected function getPaidOrderDTOs(): Collection
    {
        $items = $this->getItems();

        return $items->map(function ($item) {
            return CartItemDTO::create(
                [
                    $item->price->product,
                    $item->price,
                    $item->quantity,
                    $item->history_price,
                    $item->history_discount
                ]);
        });
    }

    public function getUnpaidOrderDTOs(): Collection
    {
        $items = $this->getItems();

        return $this->discountService->getCartItemsDTOs(
            $items,
            $items->sum('quantity'),
            $items->sum('sum'),
        );
    }

    public function getItems(): Collection
    {
        return $this->cart->getCartItemsList();
    }

    public function getCartCost(): float
    {
        return $this->getOrderItemsDTOs()->sum('sumPrice');
    }

    public function getTotalCost(): float
    {
        return $this->deliveryCostService->getCost($this->order->delivery_type) + $this->cart->getTotalCost($this->getOrderItemsDTOs());
    }

}