<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laracasts\Integrated\Extensions\Laravel as IntegratedTest;
use App\Note;

class NotesTest extends IntegratedTest
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNoteList()
    {
    	// Having
        Note::create(['note' => 'My first note']);
        Note::create(['note' => 'second note']);

        //When
        $this->visit('notes')
        	//Then
        	->see('My first note')
        	->see('second note');
    }
}
