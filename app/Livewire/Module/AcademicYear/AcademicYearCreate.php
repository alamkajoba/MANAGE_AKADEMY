<?php

namespace App\Livewire\Module\AcademicYear;

use App\Traits\AuthorizationPermissions;
use Livewire\Component;

class AcademicYearCreate extends Component
{
    use AuthorizationPermissions;

    public function mount($id)
    {
        //Trait of permissions
        $this->checkPermissionsOrFail('peut créer une année');
    }

    public function render()
    {
        return view('livewire.module.academic-year.academic-year-create');
    }
}
