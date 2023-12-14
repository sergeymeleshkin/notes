<?php

namespace App\Decorators\Cake;

class WithSprinkles extends CakeDecorator
{
    public function ingredients(): string
    {
        return $this->cake->ingredients() . ' с обсыпкой';
    }
    public function price(): float
    {
        return $this->cake->price() + 1.25;
    }
}
