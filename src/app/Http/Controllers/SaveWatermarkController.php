<?php

namespace App\Http\Controllers;

use App\Http\Service\AddWatermarkInterface;
use App\Models\Image;
use Illuminate\Http\Request;

class SaveWatermarkController
{
    public function __invoke(Request $request, AddWatermarkInterface $watermarkService)
    {
        $images = Image::where('document_id', '=', $request->document_id)->get();

        foreach ($images as $image) {
            if ($request->input('pos_x_' . $image->page)) {
                $image->watermark_filepath = $watermarkService->applyWatermark(
                    $image->filepath,
                    $request->input('pos_x_' . $image->page),
                    $request->input('pos_y_' . $image->page)
                );
                $image->save();
            }
        }

        return redirect()->route('show-document', ['document' => $request->document_id]);
    }
}
