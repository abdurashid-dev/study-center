<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'slug', 'description', 'status'];

    public function students(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentGroup::class);
    }
}
