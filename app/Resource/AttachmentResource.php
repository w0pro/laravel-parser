<?php

namespace App\Resource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AttachmentResource
{
    public function __construct(protected Request $request, protected LogResource $logResource, protected SqlResource $sqlResource)
    {
    }

    public function addAttachment(): void
    {
       $files = $this->request->file('files');

        $validator = Validator::make($this->request->only('files'), [
            'files'=> 'required|array',
            'files.*'=> 'required|mimes:txt',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages([
                'files' => __('Неверный формат данных'),
            ]);
        }

       foreach ($files as $file) {
           $file_name = $file->getClientOriginalName();
           $file_name_array = explode('.', $file_name);

           if (in_array('log', $file_name_array) && $file->getSize()){
               $path = Storage::put('/logs/', $file);
               $this->logResource->logParser($path, $file_name);
           }

           if (in_array('sql', $file_name_array) && $file->getSize()) {
               $path = Storage::put('/sql-dumps/', $file);
               $this->sqlResource->add($path);
           }

       }

    }

}
