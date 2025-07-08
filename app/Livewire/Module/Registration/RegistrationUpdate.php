<?php

namespace App\Livewire\Module\Registration;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class RegistrationUpdate extends Component
{
    public function render()
    {
        return view('livewire.module.registration.registration-update');
    }
}
