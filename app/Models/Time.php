<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Time extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = ['beasiswa_id', 'detail_id', 'time_plus', 'time_minus'];

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa_id');
    }

    public function detail()
    {
        return $this->belongsTo(Detail::class, 'detail_id');
    }

}

