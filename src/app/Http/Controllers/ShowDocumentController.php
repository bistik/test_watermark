<?php

namespace App\Http\Controllers;

use App\Models\Document;

class ShowDocumentController
{
    public function __invoke(Document $document)
    {
        return view(
            'show_document',
            compact('document')
        );
    }
}
