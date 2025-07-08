<?php

namespace App\Livewire\Module\ReRegistration;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ReRegistrationDestroy extends Component
{
    public function render()
    {
        return view('livewire.module.re-registration.re-registration-destroy');
    }
}
