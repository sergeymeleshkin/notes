<?php

namespace App\Strategies\PaymentMethod;

class ApplePayStrategy implements PaymentMethodInterface {
    public function pay(): string
    {
        return 'apple pay';
    }
}
