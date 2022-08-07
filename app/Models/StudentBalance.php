<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentBalance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'balance'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function getBalance(): string
    {
        if ($this->balance == 0) {
            return '<div class="btn btn-success"><i class="fas fa-check-circle"></i> Qarzdor emas</div>';
        } elseif ($this->balance < 0) {
            return '<div class="btn btn-danger"><i class="fas fa-history"></i> ' . number_format(abs(($this->balance)), 0, '', ' ') . ' uzs</div>';
        } else {
            return '<div class="btn btn-warning"><i class="fas fa-exclamation-triangle"></i> Xatolik</div>';
        }
    }
}
