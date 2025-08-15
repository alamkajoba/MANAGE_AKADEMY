<?php

namespace App\Livewire\Module\Registration;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class RegistrationIndex extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    #[Url(as: 'q')]
    public ?string $search = '';

    public $studentIdToDelete = '';

    public $user;
    public $password;

    protected $listeners = [
        'setStudentId',
    ];

    /**
     * Réinitialiser la pagination sur recherche
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Reçoit l'ID envoyé par JS à l'ouverture du modal
    public function setStudentId($id)
    {
        $this->studentIdToDelete = $id;
    }

    

    public function destroyStudent()
    {
        // Récupération de l'utilisateur par email
        $user = User::where('email', $this->user)->first();

        // Vérification de l'existence de l'utilisateur et du mot de passe
        if ($user && Hash::check($this->password, $user->password)) {

            $student = Student::findOrFail($this->studentIdToDelete);
            $student->delete();

            session()->flash('success', "L'étudiant a été supprimé avec succès.");
            return redirect()->route('registration.index');

        } else {
            session()->flash('danger', "Identifiant ou mot de passe incorrect.");
            return redirect()->route('registration.index');
        }
    }

    public function render()
    {
        // Récupérer l'ID de l'année en cours
        $academicYear = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->first();

        // Construire la requête des étudiants
        $query = Student::with(['enrollment' => function($q) use ($academicYear) {
            $q->where('academic_year_id', $academicYear->id)
            ->with(['option', 'level']);
        }])
        ->whereHas('enrollment', function ($q) use ($academicYear) {
            $q->where('academic_year_id', $academicYear->id);
        })
        ->where(function ($q) {
            $q->where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('middle_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%');
        });

        return view('livewire.module.registration.registration-index', [
            'student' => $query->latest()->paginate(5),
        ]);
    }
}
