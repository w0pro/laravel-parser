<?php

namespace App\Resource;

use App\Repository\LogRepository;
use Illuminate\Database\Eloquent\Collection;

class LogResource
{
    public function __construct(protected LogRepository $logRepository)
    {
    }

    public function addLog(array $log, string $name):void
    {
        $this->logRepository->add($log, $name);
    }

    public function getLogs(): ?Collection
    {
        return $this->logRepository->getLogs();
    }

    public function logParser(string $path, string $name):void
    {

        $log = file('storage/'.$path);
        $this->addLog($log, $name);

    }

}
