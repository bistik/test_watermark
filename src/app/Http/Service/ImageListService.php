<?php
declare(strict_types=1);

namespace App\Http\Service;

use Carbon\Carbon;

class ImageListService implements ImageListInterface
{
    public function makeImageArray(array $filenames): array
    {
        $imageRows = [];

        foreach ($filenames as $index => $filename) {
            $imageRows[] = [
                'page' => $index + 1,
                'filepath' => $filename,
                'created_at' => Carbon::now(),
            ];
        }

        return $imageRows;
    }

    public function addDocumentId(array $filenames, int $documentId): array
    {
        $imageRows = [];

        foreach ($filenames as $filename) {
            $filename['document_id'] = $documentId;
            $imageRows[] = $filename;
        }

        return $imageRows;
    }
}
