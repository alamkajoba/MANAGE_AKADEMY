<?php

namespace App\Livewire\Module\Recovery;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
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
    public $academicId;
   

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
        $this->academicId = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->value('id');
        $query=Payment::with(['enrollment.option','enrollment.level', 'enrollment.student', 'fees'])
        ->where('academic_year_id', $this->academicId)
        ->whereDate('created_at', $today)->get();
            
        return view('livewire.module.recovery.recovery-print', ['payments'=>$query]);
    
}
}
