<?php
namespace App\Repositories;

use App\Models\Time;
use App\Models\Detail;

class TimeRepository
{
    public function storeTime(array $data)
    {
        // Simpan data ke tabel time
        $time = Time::create($data);

        // Update waktu_bulan di tabel detail
        $detail = Detail::find($data['detail_id']);
        if ($detail) {
            $detail->updateWaktuBulan($data['time_plus'], $data['time_minus']);
        }

        return $time;
    }
}

?>