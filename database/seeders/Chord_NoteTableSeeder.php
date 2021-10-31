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
                    'chord_id'=>1,
                    'note_id'=>47,
                ],
                [ 
                    'chord_id'=>1,
                    'note_id'=>52,
                ],
                [ 
                    'chord_id'=>1,
                    'note_id'=>56,
                ],
                [ 
                    'chord_id'=>2,
                    'note_id'=>49,
                ],
                [ 
                    'chord_id'=>2,
                    'note_id'=>54,
                ],
    
                [ 
                    'chord_id'=>2,
                    'note_id'=>57,
                ],
                [ 
                    'chord_id'=>3,
                    'note_id'=>47,
                ],
                [ 
                    'chord_id'=>3,
                    'note_id'=>51,
                ],
                [ 
                    'chord_id'=>3,
                    'note_id'=>56,
                ],
                [ 
                    'chord_id'=>4,
                    'note_id'=>49,
                ],
                [ 
                    'chord_id'=>4,
                    'note_id'=>52,
                ],
                [ 
                    'chord_id'=>4,
                    'note_id'=>57,
                ],
                [ 
                    'chord_id'=>5,
                    'note_id'=>47,
                ],
                [ 
                    'chord_id'=>5,
                    'note_id'=>51,
                ],
                [ 
                    'chord_id'=>5,
                    'note_id'=>54,
                ],
                [ 
                    'chord_id'=>6,
                    'note_id'=>49,
                ],
                [ 
                    'chord_id'=>6,
                    'note_id'=>52,
                ],
                [ 
                    'chord_id'=>6,
                    'note_id'=>56,
                ],
            ]
            
            


        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
