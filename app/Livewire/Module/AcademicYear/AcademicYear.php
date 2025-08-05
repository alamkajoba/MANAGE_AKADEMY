<?php

namespace App\Livewire\Module\AcademicYear;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.topadmin')]
class AcademicYear extends Component
{
    public function render()
    {
        return view('livewire.module.academic-year.academic-year');
    }
}
