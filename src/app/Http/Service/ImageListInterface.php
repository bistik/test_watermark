<?php

namespace App\Http\Service;

interface ImageListInterface
{
    public function makeImageArray(array $filenames, int $documentId): array;
}
