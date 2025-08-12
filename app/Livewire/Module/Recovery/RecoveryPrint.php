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
use Carbon\Carbon;

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
        $today = Carbon::today();
        $query=Payment::with(['enrollment.option','enrollment.level', 'enrollment.student', 'fees'])
        ->whereDate('created_at', $today)->get();
            
        return view('livewire.module.recovery.recovery-print', ['payments'=>$query]);
    
}
}
