<?php

namespace App\Livewire\Module\Recovery;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Level;
use App\Models\Option;
use App\Models\SchoolFee;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Payment;

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
   
    public function render()
    {
        $query=Payment::with(['enrollment.option','enrollment.level', 'enrollment.student', 'fees'])->get();
            
        return view('livewire.module.recovery.recovery-print', ['payments'=>$query]);
    
}
}
// ['students' => Enrollment::with(['student', 'level', 'option', 'payments.fees'])
//             ->when($this->selectedMonth, fn($q) => $q->whereHas('payments', fn($q2) => $q2->where('school_fees_id', $this->selectedMonth)))
//             ->when($this->selectedClass, fn($q) => $q->where('level_id', $this->selectedClass))
//             ->when($this->selectedOption, fn($q) => $q->where('option_id', $this->selectedOption))
//             ->get(),]