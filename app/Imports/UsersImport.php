<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = new User
        ([
            'name'     => $row[0],
            'nama_siswa' => $row[1],
            'email'    => $row[2],
            'password' => Hash::make($row[3])
        ]);
        $user->assignRole('Orang Tua');
        return $user;
    }
}
