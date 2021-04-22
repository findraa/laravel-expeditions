<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['status_label'];
    protected $dates = ['process_at', 'shipping_at', 'finish_at', 'accepted_at'];

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
            ->orWhere('sender_name', 'like', '%' . $query . '%');
    }

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<badge class="badge badge-info">Baru</badge>';
        } elseif ($this->status == 1) {
            return '<badge class="badge badge-warning">Diproses</badge>';
        } elseif ($this->status == 2) {
            return '<badge class="badge badge-danger">Dikirim</badge>';
        } elseif ($this->status == 3) {
            return '<badge class="badge badge-primary">Selesai</badge>';
        }
        return '<badge class="badge badge-success">Diterima</badge>';
    }

    public function getQrcode($id)
    {
        // $id = md5($this->tracking_number);

        return base64_encode(QrCode::format('png')->size(80)->generate('http://127.0.0.1:8000/confirm/' . md5($id)));
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function trackings()
    {
        return $this->hasMany(Tracking::class)->orderBy('created_at', 'DESC');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
