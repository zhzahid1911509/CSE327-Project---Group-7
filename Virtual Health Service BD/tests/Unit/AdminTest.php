<?php

namespace Tests\Unit;
use App\Models\Doctor;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     public function test_show_doctor_info()
     {
        
      $response = $this->get('/showdoctor', [
        'name' => 'Towsif Khan',
        'phone' => '01854356356',
        'speciality' => 'Heart',
        'room' => '30'
       ]);

       $response->assertRedirect('/');
      
     }
     
}
