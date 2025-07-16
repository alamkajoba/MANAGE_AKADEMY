<?php

namespace App\Livewire\Module\User;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.topadmin')]
class UserCreate extends Component
{
    public function render()
    {
        return view('livewire.module.user.user-create');
    }
}
