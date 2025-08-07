<?php

namespace App\Livewire\Module\Registration;

use App\Models\Enrollments;
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

    protected $listeners = [
        'deleteStudent' => 'deleteStudent',
    ];
    /**
     * Réinitialiser la pagination sur recherche
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        session()->flash('success', "L'étudiant a été supprimé avec succès.");
    }

    public function render()
    {
        $query = Student::with(['enrollments.level', 'enrollments.option']) // 
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
