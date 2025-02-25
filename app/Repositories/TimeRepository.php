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
        if ($detail = Detail::find($data['detail_id'])) {
            $detail->updateWaktuBulan($data['time_plus'] ?? 0, $data['time_minus'] ?? 0);
        }

        // Load relasi setelah penyimpanan
        return $time->load('beasiswa', 'detail');
    }
}

?>