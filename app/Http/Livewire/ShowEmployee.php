<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class ShowEmployee extends Component
{
    public $data;
    private $feedback = false;
    public function edit($id)
    {
        dd($id);
    }

    public function delete($id)
    {
        Employee::find($id)->delete();
        $this->feedback = true;
        if($this->feedback == true) {
            Session::flash('success', 'Employee deleted successfully !!!');
        } else {
            Session::flash('failure', 'Sorry, not able to delete record !!!');
        }
        
    }

    public function render()
    {
        // get employee data
        $this->data = Employee::all();

        return view('livewire.show-employee')
                ->layout('layouts.app', ['title' => 'Show Employee']);
    }
}
