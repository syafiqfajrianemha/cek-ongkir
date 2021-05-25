<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couriers = [
            [
                'code'  => 'jne',
                'title' => 'JNE'
            ],
            [
                'code'  => 'pos',
                'title' => 'POS Indonesia'
            ],
            [
                'code'  => 'tiki',
                'title' => 'TIKI'
            ]
        ];

        Courier::insert($couriers);
    }
}
