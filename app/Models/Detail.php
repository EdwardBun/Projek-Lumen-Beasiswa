<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Detail extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $fillable = ['beasiswa_id', 'status', 'waktu_bulan'];

    public const AKTIF = "Aktif";
    public const SELESAI = "Selesai";
    public const BERHENTI = "Berhenti";

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa_id');
    }

    public function time()
    {
        return $this->hasMany(Time::class, 'detail_id');
    }

    public function updateWaktuBulan($time_plus, $time_minus)
{
    // Pastikan nilai tidak null, jika null maka dianggap 0
    $time_plus = $time_plus ?? 0;
    $time_minus = $time_minus ?? 0;

    // Hitung perubahan waktu_bulan
    $this->waktu_bulan += $time_plus;
    $this->waktu_bulan -= $time_minus;

    // Simpan perubahan ke database
    $this->save();
}


}
