<?php

namespace App\Http\Controllers;

use App\Models\Document;

class UploadFormController
{
    public function __invoke()
    {
        return view('upload_form', ['documents' => Document::limit(500)->get()]);
    }
}
