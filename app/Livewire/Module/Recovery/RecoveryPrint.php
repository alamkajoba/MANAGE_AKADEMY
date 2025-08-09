<?php

namespace App\Livewire\Module\Recovery;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Level;
use App\Models\Option;
use App\Models\SchoolFee;
use App\Models\Enrollment;
use App\Models\Student;

#[Layout('layouts.app')]
class RecoveryPrint extends Component
{
    public $levels;
    public $options;
    public $feeses;
    public $selectedMonth;
    public $selectedClass;
    public $selectedOption;
    public $nameclass;


     public function mount()
    {
        $this->levels = Level::all();
        $this->options = Option::all();
        $this->feeses = SchoolFee::all();

        $this->selectedMonth;
        $this->selectedClass;
        $this->selectedOption;
        // dd($this->selectedClass);
        // $findclass =Level::findOrFail($this->selectedClass);
        
        // $this->nameclass =$findclass->class_name;
    }
    public function getStudentsProperty()
{
       $query = Enrollment::with(['student', 'payments.fees', 'level', 'option']);
    
   if ($this->selectedMonth) {
        $query->whereHas('payments', function($q) {
            $q->where('school_fees_id', $this->selectedMonth);
        });
    } else {
       
        $query->whereHas('payments');
    }

    if ($this->selectedClass) {
        $query->where('level_id', $this->selectedClass);
    }

    if ($this->selectedOption) {
        $query->where('option_id', $this->selectedOption);
    }

    return $query->orderBy('id')->get();

}  

    public function render()
    {
       
        return view('livewire.module.recovery.recovery-create', ['students' =>$this->students]);
    
}
}
