<?php

namespace App\Livewire\Module\Fees;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\SchoolFee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.topadmin')]
class FeesIndex extends Component
{

    public $academicId;
    public $feesIdToDelete;
    public $user;
    public $password;

    // Reçoit l'ID envoyé par JS à l'ouverture du modal
    public function setFeesId($id)
    {
        $this->feesIdToDelete = $id;
    }
        
    public function destroyFee()
    {
        // Récupération de l'utilisateur par email
        $user = User::where('email', $this->user)->first();

        // Vérification de l'existence de l'utilisateur et du mot de passe
        if ($user && Hash::check($this->password, $user->password)) {

            $fee = SchoolFee::findOrFail($this->feesIdToDelete);
            $fee->delete();

            session()->flash('success', "Le frais a été supprimé avec succès.");
            return redirect()->route('fees.index');

        } else {
            session()->flash('danger', "Identifiant ou mot de passe incorrect.");
            return redirect()->route('fees.index');
        }
    }

    public function render()
    {
        $this->academicId = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->value('id');


        $fees = SchoolFee::where('academic_year_id', $this->academicId)->get();
        return view('livewire.module.fees.fees-index', ['fees' => $fees]);
    }

}
