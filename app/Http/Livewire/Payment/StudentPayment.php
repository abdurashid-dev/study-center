<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;

class StudentPayment extends Component
{
    public $date;

    public function render()
    {
        return view('livewire.payment.student-payment');
    }
}
