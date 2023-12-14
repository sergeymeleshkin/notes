<?php

namespace App\Enums;

enum PaymentMethodsEnum: string {
    case CreditCard = 'credit';
    case ApplePay = 'apple';
    case GooglePay = 'google';

}
