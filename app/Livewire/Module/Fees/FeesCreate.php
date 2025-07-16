<?php

namespace App\Livewire\Module\Fees;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Schoolfees;

#[Layout('layouts.topadmin')]
class FeesCreate extends Component
{
    public $name;
    public $description;
    public $amount;

    public function render()
    {
        return view('livewire.module.fees.fees-create');
    }
    public function save(){
        $validated= $this->validate([
            'name'=>'required|unique:schoolfees|max:255',
            'description'=>'required|unique:schoolfees|max:255',
            'amount'=>'required',
        ]);
        $this->validate = Schoolfees::where('id', $this->name, $this->description)->exists();
        Schoolfees::create($validated);
        session()->flash('message', 'Frais enregistrés avec succès !');
        $this->reset();
    }
 
    
}