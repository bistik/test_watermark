<?php
declare(strict_types=1);

namespace App\Http\Service;

interface AddWatermarkInterface
{
    public function applyWatermark(string $imagePath, int $posX, int $posY): string;
}
