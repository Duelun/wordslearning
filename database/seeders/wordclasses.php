<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class wordclasses extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = array( array('a' => 'custom',          'b' => '---'),
                        array('a' => 'noun',            'b' => 'nou'),
                        array('a' => 'verb',            'b' => 'ver'),
                        array('a' => 'adjective',       'b' => 'adj'),
                        array('a' => 'adverb',          'b' => 'adv'),
                        array('a' => 'prepositions',    'b' => 'pre'),
                        array('a' => 'pronouns',        'b' => 'pro'),
                        array('a' => 'conjunctions',    'b' => 'con'),
                        array('a' => 'phrase',          'b' => 'phr'),
                        array('a' => 'sentence',        'b' => 'sen'),
        );

        foreach($array as $records){
            DB::table('wordclasses')->insert([
                'wordclasse' => $records['a'],
                'shortform' => $records['b'],
            ]);
        }
    }
}
