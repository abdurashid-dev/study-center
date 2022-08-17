<?php

namespace App\Http\Livewire\Payment;

use App\Models\StudentPayment as StudentPaymentModel;
use Livewire\Component;

class StudentPayment extends Component
{
    public function render()
    {
        $payments = StudentPaymentModel::with('student')->orderByDesc('created_at')->get();
        return view('livewire.payment.student-payment', compact('payments'));
    }
}
