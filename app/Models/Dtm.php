<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug', 'count_tests', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

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
            $group = Group::where('id', $group_id)->select('name')->first();
            return $group->name;
        }
    }
}
