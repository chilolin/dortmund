<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('chords')->truncate();

        DB::table("chords")->insert(
            [
              [ 'name'=>'CM',
                'first_key_id'=>28,
                'second_key_id'=>47,
                'third_key_id'=>52,
                'forth_key_id'=>56,
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'Dm',
                'first_key_id'=>30,
                'second_key_id'=>49,
                'third_key_id'=>54,
                'forth_key_id'=>57,
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'Em',
                'first_key_id'=>32,
                'second_key_id'=>47,
                'third_key_id'=>51,
                'forth_key_id'=>56,
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'FM',
                'first_key_id'=>33,
                'second_key_id'=>49,
                'third_key_id'=>52,
                'forth_key_id'=>57,
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'GM',
                'first_key_id'=>23,
                'second_key_id'=>47,
                'third_key_id'=>51,
                'forth_key_id'=>54,
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'Am',
                'first_key_id'=>25,
                'second_key_id'=>49,
                'third_key_id'=>52,
                'forth_key_id'=>56,
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
                
              ]
            );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
