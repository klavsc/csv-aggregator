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
            'first_name' => $row['name'],
            'last_name' =>$row['surname'],
            'email' => $row['email'],
            'address' => $row['address'],
            'city' => $row['city'],
            'salutation' => $row['gender'],
            'social_security_number' => $row['soc_security_num'],
            'account_balance' => $row['balance'],
        ]);
    }

}
