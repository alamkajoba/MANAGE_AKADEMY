<?php

namespace App\Livewire\Module\Registration;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class RegistrationIndex extends Component
{
    public function render()
    {
        return view('livewire.module.registration.registration-index');
    }
}
