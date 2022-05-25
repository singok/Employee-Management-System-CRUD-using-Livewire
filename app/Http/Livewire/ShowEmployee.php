<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class ShowEmployee extends Component
{
    public $data = null;
    public function edit($id)
    {
        dd($id);
    }

    public function delete($id)
    {
        $this->deleteID = $id;
        $data = Employee::find($id)->delete();
        if($data) {
            $this->dispatchBrowserEvent('show-success', ['message' => 'Employee Deleted Successfully !!!']);
        } else {
            $this->dispatchBrowserEvent('show-error', ['message' => 'Not able to delete employee !!!']);
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
