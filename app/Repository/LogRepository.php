<?php

namespace App\Repository;

use App\Models\Log;
use Illuminate\Database\Eloquent\Collection;

class LogRepository
{

    public function add(array $log, string $name):void
    {
        Log::create([
            'content'=> json_encode($log, JSON_FORCE_OBJECT),
            'name' => $name
        ]);
    }

    public function getLogs(): ?Collection
    {
        return Log::all()??null;
    }

}
