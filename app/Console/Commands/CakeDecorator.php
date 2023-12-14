<?php

namespace App\Console\Commands;

use App\Decorators\Cake\SimpleCake;
use App\Decorators\Cake\WithSprinkles;
use App\Decorators\Cake\WithWhippedCream;
use App\Strategies\PaymentMethod\PaymentMethodService;
use Illuminate\Console\Command;

class CakeDecorator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cake';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cake = new SimpleCake();
        $cake = new WithWhippedCream($cake);
        $cake = new WithSprinkles($cake);
        echo $cake->ingredients(); // Простой торт со взбитыми сливками с обсыпкой
        echo $cake->price(); // 16.25

        return Command::SUCCESS;
    }
}
