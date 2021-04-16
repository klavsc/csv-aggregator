<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return Customer|null
     */

    public function model(array $row)
    {


        return new Customer([
            'name' => $row['name'],
            'surname' => $row['surname'],
            'email' => $row['email'],
            'address' => $row['address'],
            'city' => $row['city'],
            'salutation' => $row['gender'],
            'soc_security_num' => $row['soc_security_num'],
            'balance' => $row['balance'],
        ]);
    }
}
