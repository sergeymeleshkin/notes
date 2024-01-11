<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'app:install';
    protected $description = 'Installation';

    public function handle(): void
    {
        $this->call('telescope:install');
        $this->call('telescope:publish');
        $this->call('storage:link');
        $this->call('migrate');
        $this->call('db:seed');
    }
}
