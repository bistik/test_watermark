<?php

namespace App\Http\Service;

interface ImageListInterface
{
    public function makeImageArray(array $filenames): array;

    public function addDocumentId(array $filenames, int $documentId): array;
}
