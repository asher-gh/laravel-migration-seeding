<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalculatorFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_simple_addition(): void
    {
        // Test small integer numbers
        $response = $this->post(route('calculator.calculate'), [
            'num1' => 1,
            'num2' => 2,
            'operation' => '+'
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('result', 3);

        // Test larger integer numbers (1 million)
        $response = $this->post(route('calculator.calculate'), [
            'num1' => 999999,
            'num2' => 1,
            'operation' => '+'
        ]);
        $response->assertViewHas('result', 1000000);

        // Test negative numbers
        $response = $this->post(route('calculator.calculate'), [
            'num1' => -10,
            'num2' => -5,
            'operation' => '+'
        ]);
        $response->assertViewHas('result', -15);

        $response = $this->post(route('calculator.calculate'), [
            'num1' => -10,
            'num2' => 5,
            'operation' => '+'
        ]);
        $response->assertViewHas('result', -5);

        // Test that if anything not an integer, fail validation
        $response = $this->post(route('calculator.calculate'), [
            'num1' => 'not an int',
            'num2' => 5,
            'operation' => '+'
        ]);
        $response->assertInvalid();
        
        $response = $this->post(route('calculator.calculate'), [
            'num1' => 3.2,
            'num2' => 5,
            'operation' => '+'
        ]);
        $response->assertInvalid();
    }
}
