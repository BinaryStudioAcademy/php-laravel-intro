<?php

namespace Tests\Unit;

use Illuminate\Http\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public function test_example()
    {
        $response = $this->get('/test');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['data'=> true]);
    }
}
