<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCaseA()
    {
        $response = $this->JSON('POST', '/api/answers', [
            'question 1' => 4, 
            'question 2' => 3,
            'question 3' => 1,
            'question 4' => 6,
            'question 5' => 7,
            'question 6' => 3,
            'question 7' => 5,
            'question 8' => 3,
            'question 9' => 6,
            'question 10' => 6,
            'email' => 'everistus@gmail.com'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Great success! Your answer has been created',
            'perspective' => 'ENTP',
        ]);


    }

    public function testCaseB(){


        $response = $this->JSON('POST', '/api/answers', [
            'question 1' => 1, 
            'question 2' => 5,
            'question 3' => 4,
            'question 4' => 6,
            'question 5' => 5,
            'question 6' => 2,
            'question 7' => 6,
            'question 8' => 3,
            'question 9' => 3,
            'question 10' => 2,
            'email' => 'everistus@gmail.com'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Great success! Your answer has been created',
            'perspective' => 'ESTJ',
        ]);
    }

    public function testCaseC(){


        $response = $this->JSON('POST', '/api/answers', [
            'question 1' => 3, 
            'question 2' => 2,
            'question 3' => 6,
            'question 4' => 1,
            'question 5' => 7,
            'question 6' => 3,
            'question 7' => 2,
            'question 8' => 5,
            'question 9' => 2,
            'question 10' => 7,
            'email' => 'everistus@gmail.com'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Great success! Your answer has been created',
            'perspective' => 'INFP',
        ]);
    }

    public function testCaseD(){


        $response = $this->JSON('POST', '/api/answers', [
            'question 1' => 3, 
            'question 2' => 4,
            'question 3' => 7,
            'question 4' => 1,
            'question 5' => 2,
            'question 6' => 5,
            'question 7' => 4,
            'question 8' => 3,
            'question 9' => 2,
            'question 10' => 6,
            'email' => 'everistus@gmail.com'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Great success! Your answer has been created',
            'perspective' => 'ISFP',
        ]);
    }

    public function testCaseE(){


        $response = $this->JSON('POST', '/api/answers', [
            'question 1' => 4, 
            'question 2' => 4,
            'question 3' => 4,
            'question 4' => 4,
            'question 5' => 4,
            'question 6' => 4,
            'question 7' => 4,
            'question 8' => 4,
            'question 9' => 4,
            'question 10' => 4,
            'email' => 'everistus@gmail.com'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Great success! Your answer has been created',
            'perspective' => 'ESTJ',
        ]);
    }

    public function testCaseF(){


        $response = $this->JSON('POST', '/api/answers', [
            'question 1' => 1, 
            'question 2' => 1,
            'question 3' => 1,
            'question 4' => 1,
            'question 5' => 1,
            'question 6' => 1,
            'question 7' => 1,
            'question 8' => 1,
            'question 9' => 1,
            'question 10' => 1,
            'email' => 'everistus@gmail.com'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Great success! Your answer has been created',
            'perspective' => 'ISTJ',
        ]);
    }

    public function testCaseG(){


        $response = $this->JSON('POST', '/api/answers', [
            'question 1' => 7, 
            'question 2' => 7,
            'question 3' => 7,
            'question 4' => 7,
            'question 5' => 7,
            'question 6' => 7,
            'question 7' => 7,
            'question 8' => 7,
            'question 9' => 7,
            'question 10' => 7,
            'email' => 'everistus@gmail.com'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Great success! Your answer has been created',
            'perspective' => 'ESTP',
        ]);
    }
}
