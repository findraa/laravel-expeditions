<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
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
            : static::where('destination', 'like', '%' . $query . '%')
            ->orWhere('estimate', 'like', '%' . $query . '%');
    }

    public function expedition()
    {
        return $this->belongsTo(Expedition::class);
    }
}
