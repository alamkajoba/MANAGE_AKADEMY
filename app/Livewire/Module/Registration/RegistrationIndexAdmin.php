<?php

namespace App\Livewire\Module\Registration;

use App\Enums\AcademicYearStatus;
use App\Models\AcademicYear;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.topadmin')]
class RegistrationIndexAdmin extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    #[Url(as: 'q')]
    public ?string $search = '';

    protected $paginationTheme = 'bootstrap';
    public $academicId;

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

        return view('livewire.module.registration.registration-index-admin', [
            'student' => $query->latest()->paginate(5),
        ]);
    }
}
