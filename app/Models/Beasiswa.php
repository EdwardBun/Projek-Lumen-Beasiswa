<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beasiswa extends Model
{
    //
    use HasUuids;
    use HasFactory;


    protected $fillable = ['name', 'type'];

    public const PENUH = "Penuh";
    public const PARSIAL = "Parsial";
    public const BANTUAN = "Bantuan";

    public function details()
    {
        return $this->hasMany(Detail::class, 'beasiswa_id');
    }

    public function time()
    {
        return $this->hasMany(Time::class, 'beasiswa_id');
    }

}
