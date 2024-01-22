<?php

namespace App\Resource;

use App\Repository\LogRepository;
use Illuminate\Database\Eloquent\Collection;

class LogResource
{
    public function __construct(protected LogRepository $logRepository)
    {
    }

    public function addLog($log):void
    {
        $this->logRepository->add($log);
    }

    public function getLogs(): Collection
    {
        return $this->logRepository->getLogs();
    }

    public function logParser($path):void
    {

        $log = file('storage/'.$path);
        $this->addLog($log);

    }

}
