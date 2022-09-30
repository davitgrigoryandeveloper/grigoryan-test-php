<?php

namespace Tests\Feature;


use App\Http\Controllers\BasicController;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // Test function for Basic class
    public function testBoxContents()
    {
        $box = new BasicController(['toy']);
        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }

    public function testTakeOneFromTheBox()
    {
        $box = new BasicController(['torch']);
        $this->assertEquals('torch', $box->takeOne());

        // Null, now the box is empty
        $this->assertNull($box->takeOne());
    }

    public function testStartsWithALetter()
    {
        $box = new BasicController(['toy', 'torch', 'ball', 'cat', 'tissue']);

        $results = $box->startsWith('t');

        $this->assertCount(3, $results);
        $this->assertContains('toy', $results);
        $this->assertContains('torch', $results);
        $this->assertContains('tissue', $results);

        // Empty array if passed even
        $this->assertEmpty($box->startsWith('s'));
    }

}
