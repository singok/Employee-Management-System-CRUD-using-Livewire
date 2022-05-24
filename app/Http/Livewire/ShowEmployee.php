<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class ShowEmployee extends Component
{
    public $data;
    public $deleteID = null;
    public function edit($id)
    {
        dd($id);
    }

    public function delete()
    {
        Employee::find($this->deleteID)->delete();
        $this->dispatchBrowserEvent('hide-modal');
    }

    public function deleteConfirm($id)
    {
        $this->deleteID = $id;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function render()
    {
        // get employee data
        $this->data = Employee::all();

        return view('livewire.show-employee')
                ->layout('layouts.app', ['title' => 'Show Employee']);
    }
}
