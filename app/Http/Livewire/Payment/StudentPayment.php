<?php

namespace App\Http\Livewire\Payment;

use App\Models\StudentPayment as StudentPaymentModel;
use Livewire\Component;
use Livewire\WithPagination;

class StudentPayment extends Component
{
    use WithPagination;

    public $search = '';
    public $date;
    public $start;
    public $end;

    public function render()
    {
        $payments = StudentPaymentModel::query()
            ->join('students', 'students.id', '=', 'student_payments.student_id')
            //if search is empty, return all payments
            ->when(!$this->search, function ($query) {
                return $query;
            })
            //if search is not empty, return payments with student that match search
            ->when($this->search, function ($query) {
                return $query->whereHas('student', function ($query) {
                    return $query->where('full_name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->select('student_payments.*', 'students.full_name as student_full_name', 'students.slug as student_slug')
            ->paginate(20);
        return view('livewire.payment.student-payment', compact('payments'));
    }
}
