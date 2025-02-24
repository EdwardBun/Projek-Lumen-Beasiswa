<?php
namespace App\Services;

use App\Repositories\TimeRepository;

class TimeService
{
    private $timeRepository;

    public function __construct(TimeRepository $timeRepository)
    {
        $this->timeRepository = $timeRepository;
    }

    public function store(array $data)
    {
        return $this->timeRepository->storeTime($data);
    }
}
