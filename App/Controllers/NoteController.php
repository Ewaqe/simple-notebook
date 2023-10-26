<?php
namespace App\Controllers;

use \App\Models\Note;
use \Core\View;

/**
 * NoteController class links note model and view
 */
class NoteController extends \Core\Controller
{    
    /**
     * index method displays a page with all notes
     *
     * @return void
     */
    public function index() {
        $notes = Note::getNotes();
        $data["notes"] = $notes;
        return View::renderTemplate('Notebook - main', 'main.php', $data);
    }
    
    /**
     * create method displays a page with a note creation form 
     *
     * @return void
     */
    public function create() {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            return View::renderTemplate('Notebook - create', 'create.php');
        }
        else {
            $this->store();
        }
    }
    
    /**
     * store method adds the note submitted from the form to the database
     *
     * @return void
     */
    private function store() {
        $request = $_POST;
        if(array_key_exists('text', $request)) {
            Note::createNote($request["text"]);
            header("Location: /");
            exit();
        }
        else {
            throw new \Exception("Missing parameter 'text'", 400);
        }
    }
}