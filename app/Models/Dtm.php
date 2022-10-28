<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'group_id', 'count_tests'];

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->where('name', 'like', '%' . $search . '%')
                ->where('description', 'like', '%' . $search . '%');
    }
}
