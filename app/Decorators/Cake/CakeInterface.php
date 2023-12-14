<?php

namespace App\Decorators\Cake;

interface CakeInterface
{
    public function ingredients(): string;

    public function price(): float;
}
