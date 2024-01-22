<?php

namespace App\Http\Controllers;

use App\Resource\AttachmentResource;

class AttachmentController extends Controller
{
    public function __construct(protected AttachmentResource $attachmentResource)
    {
    }

    public function add()
   {
       $this->attachmentResource->addAttachment();

   }
}
