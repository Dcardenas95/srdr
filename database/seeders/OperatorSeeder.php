<?php

namespace Database\Seeders;

use App\Models\Operator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operator::create([
            'name' => 'alvaro',
            'cedula' => '1098770978',
            'lastname'=> 'gonzales barajas',
            'email' => 'alvaro@gmail.com',
            'address' => 'calle 95 # 45 - 25',
            'phone'=> 31854545,
            'type_blood'=> 'A+',
            'date_contract'=> '2/01/2024'
        ]);
    }
}
