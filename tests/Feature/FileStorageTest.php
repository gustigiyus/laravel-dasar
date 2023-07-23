<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testFileStorage()
    {
        $fileSystem = Storage::disk("local");
        $fileSystem->put("file.txt", "Gusti Giustianto");
    
        $content = $fileSystem->get("file.txt");
        self::assertEquals("Gusti Giustianto", $content);
    }

    public function testFilePublic()
    {
        $fileSystem = Storage::disk("public");
        $fileSystem->put("file.txt", "Gusti Giustianto");
    
        $content = $fileSystem->get("file.txt");
        self::assertEquals("Gusti Giustianto", $content);
    }
}
