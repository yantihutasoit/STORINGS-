<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            's_nis' => $row[0],
            's_nama' => $row[1],
            's_nama_ortu' => $row[2],
            's_tempat_lahir' => $row[3],
            's_tgl_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4']),
            's_alamat' => $row[5],
            's_gender' => $row[6],
            's_kelas' => $row[7],
            's_semester' => $row[8]
        ]);
    }
}
