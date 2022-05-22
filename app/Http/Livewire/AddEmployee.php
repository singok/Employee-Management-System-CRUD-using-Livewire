<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddEmployee extends Component
{
    public function render()
    {
        return view('livewire.add-employee')
                ->extends('layouts.app', ['title' => 'Add Employee']);
    }
}
