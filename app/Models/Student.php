<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'address', 'description'];

    public function phones(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentPhoneNumber::class, 'student_id');
    }

    public function groups(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentGroup::class);
    }

    public function attendances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function balance(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(StudentBalance::class);
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentPayment::class);
    }

    public function studentDtms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentDtm::class);
    }

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->where('deleted', 0)->where('full_name', 'like', '%' . $search . '%');
    }

    public static function globalSearch($search)
    {
        $q = Str::title($search);
        return empty($search)
            ? static::query()
            : static::query()->where('full_name', 'like', '%' . $q . '%')
                ->orWhere('address', 'like', '%' . $q . '%')
                ->orWhere('id', 'like', '%' . $search . '%');
    }
}
