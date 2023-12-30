<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class lang_setup extends Seeder
{

    public function run(): void
    {

        /* add custom option */
        DB::table('languages')->insert([
            'iso1' => '--',
            'iso2' => '---',
            'iso3' => '---',
            'isoname' => 'Custom',
            'nativename' => __('Custom'),
        ]);

        /* lang code database */
        $array = include 'db639.php';

        foreach($array as $lang){
            foreach($lang as $key => $data){
                switch($key){
                    case '639-1':
                        $iso1 = $data;
                        break;
                    case '639-2/t':
                        $iso2 = $data;
                        break;
                    case '639-3':
                        $iso3 = $data;
                        break;
                    case 'iso_language_name':
                        $isoname = $data;
                        break;
                    case 'native_name_(endonym)':
                        $natname = $data;
                        break;
                }
            }
            DB::table('languages')->insert([
                'iso1' => $iso1,
                'iso2' => $iso2,
                'iso3' => $iso3,
                'isoname' => $isoname,
                'nativename' => $natname,
            ]);
        }
        /*activate en, hu, de */
        $array = array('en', 'de', 'hu');
        foreach ($array as $d){
            switch ($d) {
                case 'en':
                    $co = 'gb';
                    break;
                case 'de':
                    $co = 'de';
                    break;
                case 'hu':
                    $co = 'hu';
                    break;
            }
            DB::table('languages')
                ->where('iso1', $d)
                ->update(['active' => true, 'country' => $co]);
        }
    }
}
