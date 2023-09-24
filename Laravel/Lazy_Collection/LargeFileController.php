<?php

use Illuminate\Support\LazyCollection;

class LargeFileController extends Controller
{
    /**
     * Process a large file and perform some operation on each line.
     *
     * @return string A message indicating that the large file processing is completed.
     */
    public function processLargeFile(): string
    {
        // Define the path to the large file
        $filePath = storage_path('app/large-file.csv');

        // Read the file
        $lines = LazyCollection::make(function () use ($filePath) {
            $file = fopen($filePath, 'r');

            while (($line = fgets($file)) !== false) {
                yield $line;
            }

            fclose($file);
        });

        // Process each line
        $lines->each(function ($line) {
            // TODO: Implement line processing logic
            // Example: $data = json_decode($line, true);
        });

        return 'Large file processing completed.';
    }
}
