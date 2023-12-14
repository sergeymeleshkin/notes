<?php

namespace App\Console\Commands;

use App\Strategies\PaymentMethod\PaymentMethodService;
use Illuminate\Console\Command;

class PaymentStrategy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pay {paymentMethod}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the payment method strategy that is used';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $strategyService = new PaymentMethodService(
            $this->argument('paymentMethod')
        );

        $this->info($strategyService->pay());

        return Command::SUCCESS;
    }
}
