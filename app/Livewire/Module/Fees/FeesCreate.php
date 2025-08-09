<?php

namespace App\Livewire\Module\Fees;

use App\Models\SchoolFee;
use Livewire\Component;
use Livewire\Attributes\Layout;

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
            'name'=>'required|unique:school_fees|max:255',
            'description'=>'required|max:255',
            'amount'=>'required',
        ]);
        $this->validate = SchoolFee::where('id', $this->name, $this->description)->exists();
        SchoolFee::create($validated);
        session()->flash('success', "Le frais a été créé avec succès.");
        return redirect()->to(route('fees.index'));
    }
 
    
}