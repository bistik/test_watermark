<?php
declare(strict_types=1);

namespace App\Http\Service;

use Spatie\PdfToImage\Exceptions\InvalidFormat;
use Spatie\PdfToImage\Exceptions\PageDoesNotExist;
use Spatie\PdfToImage\Exceptions\PdfDoesNotExist;
use Spatie\PdfToImage\Pdf;

class PdfToImageConverter implements ConverterInterface
{
    /**
     * @param string $filepath
     * @param string $destinationPath
     * @param string $filetype
     * @return bool
     * @throws PageDoesNotExist
     * @throws PdfDoesNotExist
     * @throws InvalidFormat
     */
    public function convert(string $filepath, string $destinationPath, string $filetype): array
    {
        $convertedFilenames = [];
        $pdf = new Pdf($filepath);

        for ($i = 1; $i <= $pdf->getNumberOfPages(); $i++) {
            $filename = sprintf(
                "%s-%0d.%s",
                $destinationPath,
                $i,
                $filetype
            );
            if ($pdf->setPage($i)->setOutputFormat($filetype)->saveImage($filename)) {
                $convertedFilenames[] = 'images/' . basename($filename);
            }
        }

        return $convertedFilenames;
    }
}
