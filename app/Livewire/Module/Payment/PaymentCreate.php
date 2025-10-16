<?php

namespace App\Livewire\Module\Payment;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\SchoolFee;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PaymentCreate extends Component
{

    //Var for auto complete student
    public $search = '';
    public $items_student = [];
    public $selected_student = [null];
    public $studentId;
    

    //Var for auto complete student
    public $fees = '';
    public $items_fees = [];
    public $selected_fees = [null];
    public $feesId;

    public function searchStundent(): void
    {
        //Looking for items
        $this->items_student = Student::where('first_name', 'like', '%'.$this->search.'%')
            ->orwhere('last_name', 'like', '%'.$this->search.'%')
            ->orwhere('middle_name', 'like', '%'.$this->search.'%')
            ->orwhere('code', 'like', '%'.$this->search.'%')
            ->limit(3)
            ->get()
            ->toArray();
    }

    //Selected student
    public function selectStudent($itemId): void
    {
        // Sélectionne un élément
        $this->selected_student = Student::find($itemId)->toArray();
        $this->search = $this->selected_student['middle_name'].' '.$this->selected_student['last_name'].' '.$this->selected_student['first_name'];
        $this->studentId = $this->selected_student['id'];
        $this->items_student = []; // Vide les suggestions

    }

    public function searchFees(): void
    {
        $academic_id = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->value('id');

        $this->items_fees = SchoolFee::where('academic_year_id', $academic_id)
            ->where(function ($query) {
                $query->where('name', 'like', '%'.$this->fees.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%');
            })
            ->limit(3)
            ->get()
            ->toArray();
    }

    //Selected fees
    public function selectFees($itemId): void
    {
        // Sélectionne un élément
        $this->selected_fees = SchoolFee::find($itemId)->toArray();
        $this->fees = $this->selected_fees['name'].' '.$this->selected_fees['amount'] .'Fc';
        $this->feesId = $this->selected_fees['id'];
        $this->items_fees = []; // Vide les suggestions

    }

    //Create fees
    public function SavePayment()
    {
        //Select active year
        $academic_id = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->value('id');

        //Be sure is not null
        if($this->studentId)
        {
            //Be sure is not null
            if($this->feesId)
            {
                //check if exist
                $exist = Payment::where('enrollment_id', $this->studentId)
                ->where('school_fees_id', $this->feesId)
                ->where('academic_year_id', $academic_id)->exists();

                //where Student is not saved in current year

        if($exist){
            $this->reset();
            session()->flash('danger', "l'élève a deja payé ce frais!!!.");
            return redirect()->to(route('payment.create'));
        }
        else{
            Payment::create([
                'enrollment_id' => $this->studentId,
                'school_fees_id' => $this->feesId,
                'academic_year_id' => $academic_id
            ]);
            $this->reset();
        session()->flash('success', "Paiement effectué avec succès.");
        return redirect()->to(route('recovery.print'));
        }
    }
    }
}

    public function render()
    {
        return view('livewire.module.payment.payment-create');
    }
}