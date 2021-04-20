<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Tests\TestCase;



class ExampleTest extends TestCase
{

    public function testCEOListedSuccessfully()
    {


       factory(Customer::class)->create([
            "name" => "Susan Wojcicki",
            "company_name" => "YouTube",
            "year" => "2014",
            "company_headquarters" => "San Bruno, California",
            "what_company_does" => "Video-sharing platform",
        ]);

        $user= factory(Customer::class)->create([
            "name" => "Mark Zuckerberg",
            "company_name" => "FaceBook",
            "year" => "2004",
            "company_headquarters" => "Menlo Park, California",
            "what_company_does" => "The world's largest social network",
        ]);

        $this->json('GET', 'api/customer', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "ceos" => [
                    [
                        "id" => 1,
                        "name" => "Susan Wojcicki",
                        "company_name" => "YouTube",
                        "year" => "2014",
                        "company_headquarters" => "San Bruno, California",
                        "what_company_does" => "Video-sharing platform"
                    ],
                    [
                        "id" => 2,
                        "name" => "Mark Zuckerberg",
                        "company_name" => "FaceBook",
                        "year" => "2004",
                        "company_headquarters" => "Menlo Park, California",
                        "what_company_does" => "The world's largest social network"
                    ]
                ],
                "message" => "Retrieved successfully"
            ]);
    }
}
