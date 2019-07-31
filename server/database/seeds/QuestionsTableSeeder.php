<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Uncomment the below to wipe the table clean before populating
        // DB::table('areas')->delete();

        
      

        $csvFile = public_path().'/csv/Questions.csv';

        $csv = Reader::createFromPath($csvFile, 'r');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader(); //returns the CSV header record
        $questions = $csv->getRecords();

        // print_r($questions);
       foreach($questions as $question){
        if ( empty($question)) return false;
          DB::table('Questions')->insert(
            array(
                'question' => $question['Question'],
                'dimension' => $question['Dimension'] ,
                'direction' => $question['Direction'] ,
                'meaning' => $question['Meaning']
            )
           );
       }
    }
}
