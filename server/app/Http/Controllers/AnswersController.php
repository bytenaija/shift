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
        
        //Delete the previous record for this email so that the current record to be inserted is the only record available

        Answers::where('email', $request->email
        
        )->delete();
        $answers = $request->all();
       
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
            
            if($ans > 4){
                if(!empty($all[$meaning])){
                    $all[$meaning] += $ans;
                }else{
                    $all[$meaning] = $ans;
                }
            }else if($ans < 4){
                if(!empty($all[$meaning])){
                    $all[$meaning] -= $ans;
                }else{
                    \Log::error("elslslslsls");
                    $key = array_search($meaning, $dimension);
                    \Log::error($key);
                    // $key ^= 1;
                    \Log::error($key);

                    $key = $dimension[$key];
                    if(!empty($all[$key])){
                        $all[$key] += $ans;
                    }else{
                        $all[$key] = $ans;
                    }
                }
            }else{
               
                    if(!empty($all[$dimension[0]])){
                        $all[$dimension[0]] += $ans;
                    }else{
                        $all[$dimension[0]] = $ans;
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
