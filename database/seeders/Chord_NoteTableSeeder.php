<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Chord_NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('chord_note')->truncate();

        DB::table("chord_note")->insert(
            [
                [ 
                    'chord_id'=>5,
                    'note_id'=>465,
                ],
                [ 
                    'chord_id'=>5,
                    'note_id'=>515,
                ],
                [ 
                    'chord_id'=>5,
                    'note_id'=>555,
                ],
                [ 
                    'chord_id'=>15,
                    'note_id'=>485,
                ],
                [ 
                    'chord_id'=>15,
                    'note_id'=>535,
                ],
    
                [ 
                    'chord_id'=>15,
                    'note_id'=>565,
                ],
                [ 
                    'chord_id'=>25,
                    'note_id'=>465,
                ],
                [ 
                    'chord_id'=>25,
                    'note_id'=> 505,
                ],
                [ 
                    'chord_id'=>25,
                    'note_id'=>555,
                ],
                [ 
                    'chord_id'=>35,
                    'note_id'=>485,
                ],
                [ 
                    'chord_id'=>35,
                    'note_id'=>515,
                ],
                [ 
                    'chord_id'=>35,
                    'note_id'=>565,
                ],
                [ 
                    'chord_id'=>45,
                    'note_id'=>465,
                ],
                [ 
                    'chord_id'=>45,
                    'note_id'=>505,
                ],
                [ 
                    'chord_id'=>45,
                    'note_id'=>555,
                ],
                [ 
                    'chord_id'=>55,
                    'note_id'=>485,
                ],
                [ 
                    'chord_id'=>55,
                    'note_id'=>515,
                ],
                [ 
                    'chord_id'=>55,
                    'note_id'=>565,
                ],
            ]
            
            


        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
