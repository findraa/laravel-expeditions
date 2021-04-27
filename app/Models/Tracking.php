<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
    * Search query in multiple whereOr
    *
    * @var mixed
    * @return mixed
    */
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('id', 'like', '%' . $query . '%')
            ->orWhere('tracking_number', 'like', '%' . $query . '%')
            ->orWhere('sender_name', 'like', '%' . $query . '%')
            ->orWhere('reciver_name', 'like', '%' . $query . '%')
            ->orWhere('reciver_address', 'like', '%' . $query . '%');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
