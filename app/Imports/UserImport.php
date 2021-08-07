<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'email' => $row[2],
            'password' => ''
        ]);
    }
}
