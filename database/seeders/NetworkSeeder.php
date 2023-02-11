<?php

namespace Database\Seeders;

use App\Models\Network;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Network::create([
            'name'=>'Viettel',
        ]);
        Network::create([
            'name'=>'Viettel 3',
        ]);
        Network::create([
            'name'=>'Viettel 6',
        ]);
        Network::create([
            'name'=>'Viettel 12',
        ]);
        Network::create([
            'name'=>'VinaPhone',
        ]);
        Network::create([
            'name'=>'MobiPhone',
        ]);

    }
}
