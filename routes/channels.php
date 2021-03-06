<?php

use App\Contracts\Service\CustomerServiceContract;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('payment.{payment}', function (User $user, Payment $payment) {
    return app(CustomerServiceContract::class)->getCustomer()->orders->map(function ($order) {
        return $order->payment;
    })->contains($payment);
});
