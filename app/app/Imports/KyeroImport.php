<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

class KyeroImport implements ToCollection
{
    use Importable;

    public function collection(Collection $rows)
    {

        dd($rows);
        foreach ($rows as $row) {
            User::create([
                'name' => $row[0],
            ]);
        }
    }
}
