<?php

namespace App\Http\Controllers;

use App\Resource\SqlResource;
use Inertia\Inertia;

class SqlController
{

    public function __construct(protected SqlResource $sqlResource)
    {
    }

    public function get()
    {
        $dumps = $this->sqlResource->getDumps();
        return Inertia::render('Dumps', [
            'title'=> 'Дампы',
            'dumps' => $dumps
        ]);
    }

}
