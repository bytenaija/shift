<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Answers;
use App\Questions;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answers::all();
        return response()->json($answers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question 1' => 'required',
            'question 2' => 'required',
            'question 3' => 'required',
            'question 4' => 'required',
            'question 5' => 'required',
            'question 6' => 'required',
            'question 7' => 'required',
            'question 8' => 'required',
            'question 9' => 'required',
            'question 10' => 'required',
            'email' => 'required',
        ]);
        
        Answers::where('email', $request->email
        
        )->delete();
        $answers = $request->all();
        
        // print_r($answers);
        // info($answers);
        // $answer = Answers::create($request->all());
        $all = array();

        $questions = Questions::all();
        $perspective = '';
        $index = 1;
        foreach($questions as $question){
            $dimension = $question->dimension;
            $meaning = $question->meaning;
            $direction = $question->direction;

       
            
            
            $dimension = str_split($dimension);
           
            $ans = $answers['question '. $index];
            if((int) $ans > 4){
                if($direction > 0){
                    if(!empty($all[$dimension[1]])){
                        $all[$dimension[1]] += 1;
                    }else{
                        $all[$dimension[1]] = 1;
                    }
                }else{
                    if(!empty($all[$dimension[0]])){
                        $all[$dimension[0]] += 1;
                    }else{
                        $all[$dimension[0]] = 1;
                    }
                }
            }else if((int) $ans < 4){
                if($direction > 0){
                    if(!empty($all[$dimension[0]])){
                        $all[$dimension[0]] += 1;
                    }else{
                        $all[$dimension[0]] = 1;
                    }
                }else{
                    if(!empty($all[$dimension[1]])){
                        $all[$dimension[1]] += 1;
                    }else{
                        $all[$dimension[1]] = 1;
                    }
                }
            }else{
            
                if($direction > 0){
                    if(!empty($all[$dimension[0]])){
                        $all[$dimension[0]] += 1;
                    }else{
                        $all[$dimension[0]] = 1;
                    }
                }
            }

            $index++;
        }
        
        if(array_key_exists('E', $all)){
            if(array_key_exists('I', $all)){
                if($all['E'] >= $all['I']){
                    $perspective .= 'E';
                }else{
                    $perspective .= 'I';
                }
            }else{
                $perspective .= 'E';
            }
        }else{
            $perspective .= 'I';
        }
       
        if(array_key_exists('S', $all)){
            if(array_key_exists('N', $all)){
                if($all['S'] >= $all['N']){
                    $perspective .= 'S';
                }else{
                    $perspective .= 'N';
                }
            }else{
                $perspective .= 'S';
            }
        }else{
            $perspective .= 'N';
        }

        if(array_key_exists('T', $all)){
            if(array_key_exists('F', $all)){
                if($all['T'] >= $all['F']){
                    $perspective .= 'T';
                }else{
                    $perspective .= 'F';
                }
            }else{
                $perspective .= 'T';
            }
        }else{
            $perspective .= 'F';
        }

        if(array_key_exists('J', $all)){
            if(array_key_exists('P', $all)){
                if($all['J'] >= $all['P']){
                    $perspective .= 'J';
                    
                }else{
                 
                    $perspective .= 'P';
                }
            }else{
                $perspective .= 'J';
             
            }
        }else{
            
            $perspective .= 'P';
            
        }
      
        $answers['perspective'] = $perspective;

      
        
        $answer = Answers::create($answers);

        return response()->json([
            'message' => 'Great success! Your answer has been created',
            'perspective' => $perspective,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $answer = DB::table('answers')->where('email', $email)->first();
        return response()->json($answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function edit(Answers $answers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answers $answers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answers $answers)
    {
        //
    }
}
