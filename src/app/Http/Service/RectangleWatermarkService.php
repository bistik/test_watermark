<?php
declare(strict_types=1);

namespace App\Http\Service;

use Intervention\Image\Facades\Image;

class RectangleWatermarkService implements AddWatermarkInterface
{
    private $width;
    private $height;
    private $color;

    public function __construct(int $width, int $height, string $color)
    {
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
    }

    public function applyWatermark(string $imagePath, int $posX, int $posY): string
    {
        $img = Image::make($imagePath);
        $img->rectangle(
            $posX,
            $posY,
            $posX + $this->width,
            $posY + $this->height,
            function ($draw) {
                $draw->background($this->color);
            }
        );
        $watermarkPath = 'images/watermark-' . basename($imagePath);

        $img->resize(config('app.image_width'), null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($watermarkPath);

        return $watermarkPath;
    }
}
