<?php

namespace App\Livewire\Module\Payment;

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
    

    //Var for auto complete student
    public $fees = '';
    public $items_fees = [];
    public $selected_fees = [null];

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
        $this->search = $this->selected_student['id'];
        $this->items_student = []; // Vide les suggestions

    }

    public function searchFees(): void
    {
        //Looking for items
        $this->items_fees = SchoolFee::where('name', 'like', '%'.$this->fees.'%')
            ->orwhere('description', 'like', '%'.$this->search.'%')
            ->limit(3)
            ->get()
            ->toArray();
    }

    //Selected fees
    public function selectFees($itemId): void
    {
        // Sélectionne un élément
        $this->selected_fees = SchoolFee::find($itemId)->toArray();
        $this->fees = $this->selected_fees['id'];
        $this->items_fees = []; // Vide les suggestions

    }

    //Create fees
    public function SavePayment()
    {
        //check if exist
        $exist = Payment::where('enrollment_id', $this->search)->where('fees_id', $this->fees)->exists();
        if($exist){
            session()->flash('message', "L'eleve a deja paye ce frais");
        }
        else{
            Payment::create([
                'enrollment_id' => $this->search,
                'school_fees_id' => $this->fees
            ]);
        }
        $this->reset();
        session()->flash('success', "Paiement effectué avec succès.");
        return redirect()->to(route('payment.create'));
    }

    public function render()
    {
        return view('livewire.module.payment.payment-create');
    }
}
