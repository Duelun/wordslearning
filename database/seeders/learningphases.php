<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class learningphases extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = array( array('a'=>'FirstChek',         'b'=>5,  'c'=>'Show the foreign word to chek is know',    'd'=>1, 'e'=>0, 'f'=>25, 'g'=>0,   'h'=>10, 'i'=>0),
                        array('a'=>'ShowForeg',         'b'=>10, 'c'=>'Show the foreign word',                    'd'=>2, 'e'=>5, 'f'=>15, 'g'=>1,   'h'=>10, 'i'=>0),
                        array('a'=>'AfterSleepForeig',  'b'=>15, 'c'=>'Show again next day foreign',              'd'=>1, 'e'=>1, 'f'=>20, 'g'=>3,   'h'=>10, 'i'=>0),
                        array('a'=>'RepeitForeigShort', 'b'=>20, 'c'=>'After 3 day foreign',                      'd'=>1, 'e'=>1, 'f'=>25, 'g'=>30,  'h'=>15, 'i'=>3),
                        array('a'=>'RepeitForeigMidle', 'b'=>25, 'c'=>'After 30 day foreign',                     'd'=>1, 'e'=>1, 'f'=>30, 'g'=>60,  'h'=>15, 'i'=>1),
                        array('a'=>'RepeitForeigLong',  'b'=>30, 'c'=>'After 3 months foreign',                   'd'=>1, 'e'=>1, 'f'=>35, 'g'=>180, 'h'=>10, 'i'=>1),
                        array('a'=>'EndForeig',          'b'=>35, 'c'=>'End foreign',                             'd'=>1, 'e'=>1, 'f'=>35, 'g'=>180, 'h'=>10, 'i'=>3),

                        array('a'=>'ShowOwn',          'b'=>110, 'c'=>'Show the own word',                        'd'=>2, 'e'=>5, 'f'=>125, 'g'=>1,   'h'=>110, 'i'=>0),
                        array('a'=>'AfterSleepOwn',    'b'=>115, 'c'=>'Show again next day own',                  'd'=>1, 'e'=>1, 'f'=>120, 'g'=>3,   'h'=>110, 'i'=>0),
                        array('a'=>'RepeitOwnShort',   'b'=>120, 'c'=>'After 3 day own',                          'd'=>1, 'e'=>1, 'f'=>125, 'g'=>30,  'h'=>115, 'i'=>3),
                        array('a'=>'RepeitOwnMidle',   'b'=>125, 'c'=>'After 30 day own',                         'd'=>1, 'e'=>1, 'f'=>130, 'g'=>60,  'h'=>115, 'i'=>1),
                        array('a'=>'RepeitOwnLong',    'b'=>130, 'c'=>'After 3 months own',                       'd'=>1, 'e'=>1, 'f'=>135, 'g'=>180, 'h'=>110, 'i'=>1),
                        array('a'=>'EndOwn',           'b'=>135, 'c'=>'End own',                                  'd'=>1, 'e'=>1, 'f'=>135, 'g'=>180, 'h'=>110, 'i'=>3),
        );

        foreach($array as $records){
            DB::table('learnphases')->insert([
                'id' => $records['b'],
                'name' => $records['a'],
                'description' => $records['c'],
                'minrepait' => $records['d'],
                'maxrepait' => $records['e'],
                'nextphase' => $records['f'],
                'nextdelayday' => $records['g'],
                'errorbackdrop' => $records['h'],
                'backdelayday' => $records['i'],
            ]);
        }
    }
}            