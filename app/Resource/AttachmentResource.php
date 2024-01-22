<?php

namespace App\Resource;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentResource
{
    public function __construct(protected Request $request, protected LogResource $logResource)
    {
    }

    public function addAttachment()
    {

       $files = $this->request->file('files');
       foreach ($files as $file) {
           $file_name_array = explode('.', $file->getClientOriginalName());
           if (in_array('log', $file_name_array)){
               $path = Storage::put('/logs/', $file);
               $this->logResource->logParser($path);
           }

       }

    }

}
