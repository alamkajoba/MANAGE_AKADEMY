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


    public function render()
    {
        $student = Student::where('fist_name', 'like', '%' . $this->search . '%')
                            ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                            ->orWhere('last_name', 'like', '%' . $this->search . '%');
    
    
        return view('livewire.module.registration.registration-index',[
                                                'student' => $student->latest()->paginate(5),
                                                                    ]);
    }
}
