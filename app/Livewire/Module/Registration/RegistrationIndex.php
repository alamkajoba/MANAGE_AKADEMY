<?php

namespace App\Livewire\Module\Registration;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\Enrollment;
use App\Models\Student;
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
        $student = Student::findOrFail($this->studentIdToDelete);
        $student->delete();
        session()->flash('success', "L'Etudiant a été supprimé avec succès.");
        return redirect()->to(route('registration.index'));
    }

    public function render()
    {
        // Récupérer l'ID de l'année en cours
        $academicYear = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->first();

        // Construire la requête des étudiants
        $query = Student::with(['enrollment.option', 'enrollment.level'])
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
