<?php
declare(strict_types=1);

namespace App\Http\Service;

use Intervention\Image\Facades\Image;

class AddWatermarkService implements AddWatermarkInterface
{
    public function applyWatermark(string $imagePath): string
    {
        $img = Image::make($imagePath);
        $img->rectangle(100, 100, 300, 300, function ($draw) {
            $draw->background('rgba(255, 0, 0, 0.5)');
        });
        $watermarkPath = 'images/watermark-' . basename($imagePath);
        $img->save($watermarkPath);

        return $watermarkPath;
    }
}
