<?php

namespace App\Livewire\Module\Fees;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\SchoolFee;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.topadmin')]
class FeesIndex extends Component
{

    public $academicId;

    public function render()
    {
        $this->academicId = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->value('id');


        $fees = SchoolFee::where('academic_year_id', $this->academicId)->get();
        return view('livewire.module.fees.fees-index', ['fees' => $fees]);
    }
    public function deletefees(SchoolFee $schoolfess){
        $schoolfess->delete();
        session()->flash('success', "Le frais a été supprimé avec succès.");
        return redirect()->to(route('fees.index'));

    }

}
