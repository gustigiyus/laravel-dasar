<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    public function testFileController()
    {   
        $picture = UploadedFile::fake()->image('gusti.png');

        $this->post('/file/upload', [
            'picture' => $picture
        ])->assertSeeText("Ok gusti.png");
    }
}
