<?php

namespace App\Strategies\PaymentMethod;

class CreditCardStrategy implements PaymentMethodInterface {
    public function pay(): string
    {
        return 'credit card';
    }
}
