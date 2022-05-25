<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class ShowEmployee extends Component
{
    public $employeeId = null;
    public $fname, $lname, $email, $phone, $city, $state, $zipcode;

    public $search = null;

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

    use WithPagination;
    public function render()
    {
        // get employee data
        $searchTerm = "%".$this->search."%";

        $data = Employee::where('fname', 'LIKE', $searchTerm)
                        ->orwhere('lname', 'LIKE', $searchTerm)
                        ->orwhere('email', 'LIKE', $searchTerm)
                        ->orwhere('phone', 'LIKE', $searchTerm)
                        ->orwhere('city', 'LIKE', $searchTerm)
                        ->orwhere('state', 'LIKE', $searchTerm)
                        ->orwhere('zipcode', 'LIKE', $searchTerm)
                        ->paginate(5);

        return view('livewire.show-employee', ['data' => $data])
                ->layout('layouts.app', ['title' => 'Show Employee']);
    }
}
