<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $employeeCount = null;
    public function mount()
    {
        $this->employeeCount = DB::table('employee')->count();
    }

    public function render()
    {
        return view('livewire.dashboard')
                ->layout('layouts.app',['title' => 'Dashboard']);
    }
}
