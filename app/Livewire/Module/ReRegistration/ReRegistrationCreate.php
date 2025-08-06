<?php

namespace App\Livewire\Module\ReRegistration;

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

    public function searchStundent(): void
    {
        //Looking for items
        $this->items_student = Student::where('first_name', 'like', '%'.$this->search.'%')
            ->orwhere('last_name', 'like', '%'.$this->search.'%')
            ->orwhere('middle_patient', 'like', '%'.$this->search.'%')
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
        $this->search = $this->selected_student['id'];
        $this->items_student = []; // Vide les suggestions

    }

    public function render()
    {
        return view('livewire.module.re-registration.re-registration-create');
    }
}
