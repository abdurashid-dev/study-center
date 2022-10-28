<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'group_id', 'slug', 'count_tests'];

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->where('name', 'like', '%' . $search . '%')
                ->where('description', 'like', '%' . $search . '%');
    }

    public function getGroupName($group_id)
    {
        if (is_null($group_id)) {
            return 'Umumiy test';
        } else {
            $group = Group::find($group_id)->select('name')->first();
            return $group->name;
        }
    }
}
