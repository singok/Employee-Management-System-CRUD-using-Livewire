<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class ShowEmployee extends Component
{
    public $data = null;

    public $deleteID = null;
    public $fname = null;
    public $lname = null;
    public $email = null;
    public $phone = null;
    public $city = null;
    public $state = null;
    public $zipcode = null;

    // show update form 
    public function showEditForm($id)
    {
        $data = DB::table('employee')->select('fname','lname','email','phone','city','state','zipcode')->where('id','=', $id)->first();
        $this->fname = $data->fname;
        $this->lname = $data->lname;
        $this->email = $data->email;
        $this->phone =$data->phone;
        $this->city = $data->city;
        $this->state = $data->state;
        $this->zipcode = $data->zipcode;

        $this->deleteID = $id;

        // create event 
        $this->dispatchBrowserEvent('show-edit-form');
    }

    // delete employee details
    public function delete($id)
    {
        $isEmployee = Employee::find($id)->delete();
        if($isEmployee) {
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
