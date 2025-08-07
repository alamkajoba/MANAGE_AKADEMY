<?php

namespace App\Livewire\Module\Registration;

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

    public function render()
    {
        $query = Student::with(['enrollments.level', 'enrollments.option']) // 
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
