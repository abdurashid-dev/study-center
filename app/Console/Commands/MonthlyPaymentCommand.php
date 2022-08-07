<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MonthlyPaymentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly payment command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
