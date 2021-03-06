<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;

class AddEmployee extends Component
{
    
    public Employee $emp;
    public $feedback = false;
    protected $rules = [
        'emp.fname' => 'required',
        'emp.lname' => 'required',
        'emp.email' => 'required | email',
        'emp.phone' => 'required',
        'emp.city' => 'required',
        'emp.state' => 'required',
        'emp.zipcode' => 'required'
    ];

    public function mount()
    {
        $this->emp = new Employee();
    }

    // insert employee details
    public function save()
    {
        // validate
        $this->validate();

        // data insert 
        $this->emp->save();
        $this->feedback = true;

        if ($this->feedback == 'true') {
            $this->dispatchBrowserEvent('employeeAdd', ['message' => 'Employee Added Successfully !!!']);
        } else {
            $this->dispatchBrowserEvent('employeeNotAdd', ['message' => 'Not able to add employee !!!']);
        }
        
    }

    public function render()
    {
        return view('livewire.add-employee')
                ->layout('layouts.app', ['title'=>'Add Employee']);
    }
}
