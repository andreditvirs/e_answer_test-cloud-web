<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // IST
        $abcde = json_encode(["a", "b", "c", "d", "e"]);
        $no0sd10 = json_encode(["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"]);
        $tests_id = Test::where('name', 'INTELLIGENZ STRUKTUR TEST')->first()->id;
        for($i = 1; $i <= 136; $i++){
            $question = new Question();
            $question->number = $i;
            $question->text = "";
            $question->options = $abcde;
            $question->type = "PILGAN";
            if($i > 60 && $i <= 76){
                $question->options = "";
                $question->type = "URAIAN";
            }else if($i > 77 && $i <= 116){
                $question->options = $no0sd10;
                $question->type = "PILGAN";
            }
            $question->notes = "";
            $question->tests_id = $tests_id;
            $question->save();
        }

        // KRAEPELIN
        $i = 1;
        $tests_id = Test::where('name', 'KRAEPELIN')->first()->id;
        for($c = 1; $c <= 50; $c++){
            $atas = 0;
            for($r = 1; $r <= 27; $r++){ // 27 - 2
                $bawah = $atas;
                if($r == 1){
                    $bawah = rand(1, 9); // only generate one time
                }
                $atas = rand(1, 9);
                $answer_key = $bawah + $atas;
                if($answer_key >= 10){
                    $answer_key -= 10; 
                }

                $question = new Question();
                $question->number = $i;
                $question->row_number = $r;
                $question->col_number = $c;
                $question->text = json_encode(array("bawah" => $bawah, "atas" => $atas));
                $question->options = "";
                $question->type = "KRAEPELIN";
                $question->answer_key = $answer_key;
                $question->notes = "";
                $question->tests_id = $tests_id;
                $question->save();
                $i++;
            }
        }
    }
}
