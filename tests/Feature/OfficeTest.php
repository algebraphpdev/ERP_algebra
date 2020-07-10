<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Office;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class OfficeTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowOffice()
    {
        $office = Office::get()->random();
        $response = $this->get(route('offices.show', $office->id));

        $response->assertStatus(200);

        $response->assertViewIs('Centaur::offices.show');
        $response->assertViewHas('office');

       // $returnedOffice = $response->original->office;
       // $this->assertEquals($office->id, $returnedOffice->id, "Returned office is diffrend from the one we've requested!");
    }
}
