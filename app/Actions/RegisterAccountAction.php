<?php
namespace App\Actions;


use App\Models\Customer;

class RegisterAccountAction{
    public  function handle($name,$phone,$email,$password){

        Customer::firstOrCreate([
            'phone' => $phone,
            'email' => $email,
        ],
        [
            'name' => $name,
            'password' => $password,
        ]
        );
    }
}
