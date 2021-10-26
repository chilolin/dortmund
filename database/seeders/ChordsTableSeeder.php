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
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'Dm',
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'Em',
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'FM',
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'GM',
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
              [ 'name'=>'Am',
                'created_at'=>now(),
                'updated_at'=>now(),
              ],
                
              ]
            );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
