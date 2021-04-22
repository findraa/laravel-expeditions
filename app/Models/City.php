<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function province()
    {
        return $this->belongsTo(Province::class);
    }

     /**
     * Search query in multiple whereOr
     *
     * @var mixed
     * @return mixed
     */
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%');
    }
}
