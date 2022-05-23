<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class ShowEmployee extends Component
{
    public function render()
    {
        // get employee data
        $data = Employee::paginate(8);

        return view('livewire.show-employee', ['data' => $data]);
    }
}
