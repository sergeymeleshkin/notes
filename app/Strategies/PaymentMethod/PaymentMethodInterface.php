<?php

namespace App\Strategies\PaymentMethod;

interface PaymentMethodInterface {
    public function pay(): string;
}
