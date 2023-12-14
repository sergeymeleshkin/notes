<?php

namespace App\Strategies\PaymentMethod;

class PaymentMethodService {
    private PaymentMethodInterface $strategy;

    public function __construct(string $paymentMethod){
        $this->strategy = match ($paymentMethod) {
            'CreditCard' => new CreditCardStrategy(),
            'ApplePay'  => new ApplePayStrategy(),
            'GooglePay' => new GooglePayStrategy(),
            default  => throw new \InvalidArgumentException(
                'You must pass in either CreditCard, ApplePay or GooglePay as the payment method.'
            )
        };
    }

    public function pay(): string {
        return $this->strategy->pay();
    }
}
