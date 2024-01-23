<?php

namespace App\Resource;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SqlResource
{
    public function add(string $path): void
    {
        $dump = Storage::get($path);
        preg_match('/create\s+table\s+\`?\w+`/i', $dump, $tables);

        foreach ($tables as $table) {
            preg_match('/\`?\w+`/i', $table, $names);
            $name = $names[0];
            $new_name = substr($name, 1, strlen($name) - 2). '_parse_'.Str::random(8);
            $dump = preg_replace($name, $new_name, $dump);
        }

        DB::unprepared($dump);
    }

    public function getDumps():array
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current',$tables);
        $dumps = [];

        foreach ($tables as $table) {
            if (str_contains($table, '_parse_')) {
                $table_data = DB::table($table)->get();
                $dumps[] = array(
                    'table_name' => $table,
                    'attr' => array_keys((array) $table_data[0]),
                    'data'=>$table_data
                );
            }
        }

       return $dumps;

    }
}
