<?php

namespace App\Http\Controllers;

use App\Resource\LogResource;
use Inertia\Inertia;

class LogController extends Controller
{
    public function __construct(protected LogResource $logResource)
    {
    }

    public function get()
    {
        $logs = $this->logResource->getLogs();
        return Inertia::render('Logs', [
            'title'=> 'Логи',
            'logs' => $logs
        ]);
    }
}
