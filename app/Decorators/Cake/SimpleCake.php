<?php

namespace App\Decorators\Cake;

class SimpleCake implements CakeInterface
{
    public function ingredients(): string
    {
        return 'Простой торт';
    }
    public function price(): float
    {
        return 12.5;
    }
}
