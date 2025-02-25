<?php
namespace App\Services;

use App\Repositories\TimeRepository;
use App\Models\Detail;

class TimeService
{
    private $timeRepository;

    public function __construct(TimeRepository $timeRepository)
    {
        $this->timeRepository = $timeRepository;
    }

    public function store(array $data)
    {
        $time = $this->timeRepository->storeTime($data);

        if ($detail = Detail::find($data['detail_id'])) {
            $detail->updateWaktuBulan($data['time_plus'] ?? 0, $data['time_minus'] ?? 0);
        }

    
        return $time;
    }
}
