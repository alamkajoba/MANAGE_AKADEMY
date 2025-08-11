<?php

namespace App\Livewire\Module\AcademicYear;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.topadmin')]
class AcademicYearIndex extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $start_date;

    #[Validate('required')]
    public $end_date;

    //SUBMIT ACADEMIC YEAR
    public function submitAcademic()
    {
        AcademicYear::create([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ]);

        session()->flash('success', "Année scolaire créée avec succès!.");
        return redirect()->to(route('admin.academic'));
    }

    public function activeAcademic($id)
    {
        $disable = AcademicYear::where('status', 'active')->limit(1);
        $enable = AcademicYear::findOrFail($id);

        //Switch to inactive last year
        if($disable)
        {
            $disable->update([
                'status' => AcademicYearStatus::PASSED->value,
            ]);
        }

        //Active new
        $enable->update([
            'status' => AcademicYearStatus::CURRENT->value,
        ]);
        session()->flash('success', "Année scolaire activée avec succès!.");
        return redirect()->to(route('admin.academic'));
    }

    //LOADING ENUM
    public function statusAcademic(): array
    {
        return AcademicYearStatus::cases();
    }
    public function render()
    {
        $academic = AcademicYear::all();
        return view('livewire.module.academic-year.academic-year-index',[
            'academic'=> $academic,
                    ]);
    }
}
