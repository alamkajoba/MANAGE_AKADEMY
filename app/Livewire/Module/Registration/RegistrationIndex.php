<?php

namespace App\Livewire\Module\Registration;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class RegistrationIndex extends Component
{
    use WithPagination;

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

    #SweatAlert
    public function confirmDelete($id)
    {
        // On envoie l'ID et le nom de la méthode à appeler via JS
        $student = Student::findOrFail($id);
        $this->dispatch('confirm', [
            'title' => $student->first_name.' '.$student->middle_name.' '.$student->last_name,
            'text' => 'Voulez-vous vraiment supprimer ?',
            'id' => $student->id,
            'method' => 'deleteStudent',
        ]);

    }

    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        // if ($student) {
        //     $student->delete();
        //     $this->dispatch('toast', [
        //         'type' => 'success',
        //         'message' => 'Étudiant supprimé avec succès.'
        //     ]);
        // } else {
        //     $this->dispatch('toast', [
        //         'type' => 'error',
        //         'message' => 'Étudiant introuvable.'
        //     ]);
        // }
    }

    public function render()
    {
        $query = Student::query()
            ->where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('middle_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%');

        return view('livewire.module.registration.registration-index', [
            'student' => $query->latest()->paginate(5),
        ]);
    }
}
