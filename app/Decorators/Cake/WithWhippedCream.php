<?php

namespace App\Decorators\Cake;

class WithWhippedCream extends CakeDecorator
{
    public function ingredients(): string
    {
        return $this->cake->ingredients() . ' со взбитыми сливками';
    }
    public function price(): float
    {
        return $this->cake->price() + 2.5;
    }
}
