<?php

namespace App\Strategies\PaymentMethod;

class GooglePayStrategy implements PaymentMethodInterface {
    public function pay(): string
    {
        return 'google pay';
    }
}
