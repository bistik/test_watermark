<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class SaveDocumentController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'document' => ['required', 'file', 'mimes:pdf,PDF', 'max:2048']
        ]);

        Document::create([
            'filepath' => $request->file('document')->store('documents'),
            'original_filename' => $request->file('document')->getClientOriginalName(),
            'filetype' => $request->file('document')->extension(),
        ]);

        return redirect()->route('index');
    }
}
