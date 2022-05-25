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

    public $employeeId = null;
    public $fname, $lname, $email, $phone, $city, $state, $zipcode;
    protected $rules = [
        "fname" => "required",
        "lname" => "required",
        "email" => "required",
        "phone" => "required | email",
        "city" => "required",
        "state" => "required",
        "zipcode" => "required"
    ];

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

        $this->employeeId = $id;

        // create event 
        $this->dispatchBrowserEvent('show-edit-form');
    }

    // update employee details
    public function updateEmployee()
    {
        DB::table('employee')->where('id', $this->employeeId)->update([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode
        ]);
        //dd($this->fname);
        $this->dispatchBrowserEvent('update-employee', ['message' => 'Employee Details Updated Successfully !!!']);

    }

    // delete confirm dialogue box
    public function deleteConfirm($id)
    {
        $this->employeeId = $id;
        $this->dispatchBrowserEvent('delete-modal');
    }

    // delete employee
    public function delete()
    {
        $isEmployee = Employee::find($this->employeeId)->delete();
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
