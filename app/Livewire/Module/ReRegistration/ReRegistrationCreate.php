<?php

namespace App\Livewire\Module\ReRegistration;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\Enrollment;
use App\Models\Level;
use App\Models\Option;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ReRegistrationCreate extends Component
{
    //Var for auto complete student
    public $search = '';
    public $items_student = [];
    public $selected_student = [null];
    public $studentId;

    public $optionId;
    public $classeId;
        
    public $option;
    public $classe;

    # SEARCH AND SELECT STUDENT FOR RE-REGISTRATION ##########################
    public function searchStundent(): void
    {
        //Looking for items
        $this->items_student = Student::where('first_name', 'like', '%'.$this->search.'%')
            ->orwhere('last_name', 'like', '%'.$this->search.'%')
            ->orwhere('middle_name', 'like', '%'.$this->search.'%')
            ->orwhere('code', 'like', '%'.$this->search.'%')
            ->limit(1)
            ->get()
            ->toArray();
    }
    //Selected student
    public function selectStudent($itemId): void
    {
        // Sélectionne un élément
        $this->selected_student = Student::find($itemId)->toArray();
        $this->search = $this->selected_student['middle_name'] . ' '.$this->selected_student['last_name'].' '.$this->selected_student['first_name'].' '.$this->selected_student['code'];
        $this->studentId = $this->selected_student['id'];
        $this->items_student = []; // Vide les suggestions

    }
    # END REGION SEARCH AND SELECT STUDENT FOR RE-REGISTRATION ####################

    public function mount()
    {
        $this->classe = Level::all();
        $this->option = Option::all();
    }

    # REGION SAVE RE-REGISTRATION ####################
    public function saveReregistration()
    {
        if($this->studentId)
        {
            $oldEnrollment = Student::findOrFail($this->studentId);
            $academic_id = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->value('id');

            Enrollment::create([
                    'student_id' => $oldEnrollment->id,
                    'level_id' => $this->classeId,
                    'option_id' => $this->optionId,
                    'academic_year_id' => $academic_id
                ]);
            session()->flash('success', "L'étudiant a été Re-inscrit avec succès.");
            return redirect()->to(route('registration.index'));
        }
        session()->flash('danger', "Aucun étudiant n'a été selectionné.");
        return redirect()->to(route('reregistration.create'));

        
    }

    # END REGION SAVE RE-REGISTRATION ####################

    public function render()
    {
        return view('livewire.module.re-registration.re-registration-create',[
            'classe' => $this->classe,
            'option' => $this->option
        ]);
    }
}
