<?php

namespace App\Models;

use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['name','guest_number','status','location'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => TableStatus::class,
        'location' => TableLocation::class,
    ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}