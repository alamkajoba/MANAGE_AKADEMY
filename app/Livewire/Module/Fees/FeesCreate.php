<?php

namespace App\Livewire\Module\Fees;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\SchoolFee;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.topadmin')]
class FeesCreate extends Component
{
    public $name;
    public $description;
    public $amount;
    public $academic_year_id;

    public function render()
    {
        return view('livewire.module.fees.fees-create');
    }
    public function save(){
        //Select active year
        $this->academic_year_id = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->value('id');
        if($this->academic_year_id)
        {
            $validated= $this->validate([
                'name'=>'required|unique:school_fees|max:255',
                'description'=>'required|max:255',
                'amount'=>'required',
                'academic_year_id' => 'required'
            ]);
            $this->validate = SchoolFee::where('id', $this->name, $this->description)->exists();
            SchoolFee::create($validated);
            session()->flash('success', "Le frais a été créé avec succès.");
            return redirect()->to(route('fees.index'));
        }
        else{
            session()->flash('danger', "Aucune année n'a été initialisée pour l'instant.");
            return redirect()->to(route('fees.create'));
        }
        
    }
 
    
}