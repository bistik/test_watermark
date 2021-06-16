<?php
declare(strict_types=1);

namespace App\Http\Service;

use Carbon\Carbon;

class ImageListService implements ImageListInterface
{

    public function makeImageArray(array $filenames, int $documentId): array
    {
        $imageRows = [];

        foreach ($filenames as $filename) {
            $imageRows[] = [
                'document_id' => $documentId,
                'filepath' => $filename,
                'created_at' => Carbon::now(),
            ];
        }

        return $imageRows;
    }
}
