<?php

namespace App\Http\Service;

interface ConverterInterface
{
    public function convert(string $filepath, string $destinationPath, string $filetype): array;
}
