<?php

namespace Tests\Feature;


use Tests\TestCase;


class ExampleTest extends TestCase
{
    /**
     @test
     */
    public function CustomerImportedSuccessfully()
    {
        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->firstName,
            'email' => $this->faker->firstName,
            'address' => $this->faker->firstName,
            'city' => $this->faker->firstName,
            'salutation' => $this->faker->firstName,
            'social_security_number' => $this->faker->firstName,
            'account_balance' => $this->faker->firstName,

        ];

        $this->post(route('customer.import').$data)
            ->assertStatus(201)
            ->assertJson(compact('data'));

//        $customerImport = new CustomerController(new Customer);
//        $customer = $customerImport->import($data);
//
//        $this->assertInstanceOf(Customer::class, $customer);
//        $this->assertEquals($data['first_name'], $customer);
//        $this->assertEquals($data['last_name'], $customer);
//        $this->assertEquals($data['email'], $customer);
//        $this->assertEquals($data['address'], $customer);
//        $this->assertEquals($data['city'], $customer);
//        $this->assertEquals($data['salutation'], $customer);
//        $this->assertEquals($data['social_security_number'], $customer);
//        $this->assertEquals($data['account_balance'], $customer);
//
    }
}
