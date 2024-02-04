<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TodoListLW extends Component
{
    public $todos;
    public $task = '';
    public $taskStatus =[];

    protected $listeners = ['taskAdded' => 'fetchTodos'];

    function mount() {
        $this -> fetchTodos();
    }

     
    public function render()
    {
      
        return view('livewire.todo-list-l-w');
    }



    public function fetchTodos() {
        $user = Auth::user();
        if($user) {
        $this -> todos =  $user -> todolist()-> orderBy ('created_at', 'desc') ->get() ;
        }
    }

    function addTodo() {

        try {

        
    $user = Auth::user();

    if ($user) {

       if($this -> task != '') {
        $todo = new todolist();
     
        $todo->task_name = $this -> task;
        $todo->task_status = 0; // Default status is to be unchecked 
        $todo->posted_by = $user->id; // Assign the user ID to the user_id column in the todolist table
        $todo-> save();
        $this ->task = '';
        $this -> fetchTodos();
        $this->emit('taskAdded'); 
       }
    }

} catch (\Exception $e) {
    Log::error('Error adding todo:' . $e ->getMessage());
}
}
   

    public function taskUpdated()
{
    $this->emit('taskAdded');
}
// this function is to delete a task
public function deleteTask() {


}




}
