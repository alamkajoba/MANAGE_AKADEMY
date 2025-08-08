<?php

namespace App\Livewire\Module\Recovery;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Level;
use App\Models\Option;
use App\Models\SchoolFee;
use App\Models\Enrollment;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class RecoveryCreate extends Component
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
    
    if (!$this->selectedMonth || !$this->selectedClass || !$this->selectedOption) {
        return collect(); 
    }

    $query = Enrollment::with(['student', 'payments.fees', 'level', 'option'])
        ->where('level_id', $this->selectedClass)
        ->where('option_id', $this->selectedOption)
        ->whereHas('payments', function($q) {
            $q->where('school_fees_id', $this->selectedMonth);
        });

    return $query->orderBy('id')->get();
}
    

    public function render()
    {
       
        return view('livewire.module.recovery.recovery-create', ['students' =>$this->students]);
    
}
}