<?php

namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     public function test_login_form()
     {
         $response = $this->get('/login');

         $response->assertStatus(200);
     }

     public function test_user_duplication()
     {
       $user1 = User::make([
         'name' => 'Zahid Hasan',
         'email' => 'zahid.hasan.002@gmail.com'
       ]);

       $user2 = User::make([
         'name' => 'Towsif Khan',
         'email' => 'towsif.khan.004@gmail.com'
       ]);
       $this->assertTrue($user1->name != $user2->name);
     }

     public function test_new_appointment_made()
     {
      
 
       $response = $this->get('/myappointment', [
        'name' => 'Md.Sajib',
        'email' => 'sajib@gmail.com',
        'phone' => '0194564643',
        'doctor' => 'Md. Kabir',
        'date' => '2022-04-23'
       ]);
       $response->assertRedirect('/');
       
     }
     public function test_register_new_users()
     {
       $response = $this->post('/register', [
         'name' => 'Rafid',
         'email' => 'rafid005@gmail.com',
         'password' => 'rafid234',
         'password_confirmation' => 'rafid234'
       ]);
       $response->assertRedirect('/home');
     }
     
   }

     


