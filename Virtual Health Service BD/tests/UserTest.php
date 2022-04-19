<?php

namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
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
