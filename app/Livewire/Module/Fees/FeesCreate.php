<?php

namespace App\Livewire\Module\Fees;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\SchoolFee;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
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

    if (!$this->academic_year_id) {
        session()->flash('danger', "Aucune année académique active trouvée.");
        return redirect()->to(route('fees.create'));
    }

    
        $converteName = Str::lower(trim($this->name));

    
        $exists = SchoolFee::where('academic_year_id', $this->academic_year_id)
            ->whereRaw('LOWER(name) = ?', [$converteName])
            ->exists();

        if ($exists) {
            session()->flash('danger', "ce frais existe déjà!.");
            return redirect()->to(route('fees.create'));
        }

     
        $validated = $this->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
        ]);

        $validated['academic_year_id'] = $this->academic_year_id;


        SchoolFee::create($validated);

        session()->flash('success', "Le frais a été créé avec succès.");
        return redirect()->to(route('fees.index'));
}
 
    
}