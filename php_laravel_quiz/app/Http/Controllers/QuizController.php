<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
    // public function getQuiz(){
    //     $response = Http::get('https://opentdb.com/api.php?amount=10&type=multiple');
    //     $data = $response->json();
    //     // dd($data);

    //     $vraag = $data['results'][0]['question'];
    //     $a1    = $data['results'][0]['correct_answer'];
    //     $a2    = $data['results'][0]['incorrect_answers'][0];
    //     $a3    = $data['results'][0]['incorrect_answers'][1];
    //     $a4    = $data['results'][0]['incorrect_answers'][2];

    //     return view('quiz', compact('vraag', 'a1', 'a2', 'a3', 'a4'));
        
    // }
    
    public function getQuiz()
{
    $response = Http::get('https://opentdb.com/api.php?amount=10&type=multiple');
    $data = $response->json();

    $questions = [];

    foreach ($data['results'] as $result) {
        $question = [
            'vraag' => $result['question'],
            'a1' => $result['correct_answer'],
            'a2' => $result['incorrect_answers'][0],
            'a3' => $result['incorrect_answers'][1],
            'a4' => $result['incorrect_answers'][2],
        ];

        // $answers = [$a1, $a2, $a3, $a4];
        // shuffle($answers);
        // session(['answers' => $answers, 'correct_answer' => $a1]);

        $questions[] = $question;
    }

    return view('quiz', compact('questions'));
}


public function checkAnswer(Request $request){

    $answers = $request->input('answers');

    $correctAnswers = array_fill(0, count($answers), '1');

    $score = 0;

    foreach ($answers as $questionIndex => $selectedAnswer) {
        if ($selectedAnswer === '1') {
            $score += 1;
        }
    }

    $request->session()->put('score', $score);

    return redirect()->route('result');

}

public function result()
{
    return view('result');
}
}