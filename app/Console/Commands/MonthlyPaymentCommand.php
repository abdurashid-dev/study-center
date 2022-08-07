<?php

namespace App\Console\Commands;

use App\Models\Student;
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
        $students = Student::with('groups.group', 'balance')->where('deleted', false)->get();
        foreach ($students as $student) {
            foreach ($student->groups as $group) {
                $student->balance->balance = $student->balance->balance - $group->group->price;
                $student->balance->save();
            }
        }
        echo 'Monthly payment command ';
    }
}
