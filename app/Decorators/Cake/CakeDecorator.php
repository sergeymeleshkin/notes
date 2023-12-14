<?php

namespace App\Decorators\Cake;

abstract class CakeDecorator implements CakeInterface
{
    protected CakeInterface $cake;
    public function __construct(CakeInterface $cake)
    {
        $this->cake = $cake;
    }
}
