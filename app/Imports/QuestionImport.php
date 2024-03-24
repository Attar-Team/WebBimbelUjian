<?php

namespace App\Imports;

use App\Models\Question;
use App\Models\QuestionDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionImport implements ToCollection
{
    private $exam_id;
    public function setExam($exam_id){
        $this->exam_id = $exam_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $row)
    {
        foreach($row as $item){

            $question = Question::create([
                "exam_id"=> $this->exam_id,
                "question"=> $item["0"]
            ]);
            
            $data = [];
            for ($i = 1; $i < count($item)-1; $i++){
                $data[$i] = [
                    "question_id"=> $question->id,
                    "content_answer"=> $item[$i],
                    "correct_answer"=> $item[$i] == $item[count($item) - 1] ? true : false,
                ];
            }
            QuestionDetail::insert($data);
        }
    }
}
