<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class countries_setup extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* lang code database */
        include 'raw_data_world.php';

        /* add custom option */
        DB::table('countries')->insert([
            'alpha2' => '--',
            'alpha3' => '---',
            'en' => 'Custom',
            'own' => __('Custom'),
        ]);

        foreach($array as $country){
            foreach($country as $key => $data){
                switch($key){
                    case 'alpha2':
                        $alpha2 = $data;
                        break;
                    case 'alpha3':
                        $alpha3 = $data;
                        break;
                    case 'name':
                        $en = $data['en'];
                        if (array_key_exists($alpha2, $data)){
                            $own = $data[$alpha2];
                        } else {
                            $own = '';
                        }
                        break;
                }
            }
            DB::table('countries')->insert([
                'alpha2' => $alpha2,
                'alpha3' => $alpha3,
                'en' => $en,
                'own' => $own,
            ]);
        }
    }
}
