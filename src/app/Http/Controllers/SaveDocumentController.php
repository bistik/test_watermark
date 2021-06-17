<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Service\ConverterInterface;
use App\Http\Service\ImageListInterface;
use App\Models\Document;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaveDocumentController
{
    public function __invoke(
        Request $request,
        ConverterInterface $pdfConverter,
        ImageListInterface $imageList
    ) {
        $request->validate([
            'document' => ['required', 'file', 'mimes:pdf,PDF', 'max:2048']
        ]);

        $pdfPath = $request->file('document')->store('documents');

        if (!Storage::exists('images')) {
            Storage::makeDirectory('images');
        }

        $images = $imageList->makeImageArray(
            $pdfConverter->convert(
                storage_path('app/documents/' . basename($pdfPath)),
                public_path('images/' . pathinfo($pdfPath, PATHINFO_FILENAME)),
                config('app.image_default_type')
            )
        );

        $document = Document::create([
            'filepath' => $pdfPath,
            'original_filename' => $request->file('document')->getClientOriginalName(),
            'filetype' => $request->file('document')->extension(),
        ]);
        $images = $imageList->addDocumentId($images, $document->id);
        Image::insert($images);

        return redirect()->route('index');
    }
}
