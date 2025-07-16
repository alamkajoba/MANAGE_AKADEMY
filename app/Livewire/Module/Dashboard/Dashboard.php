<?php

namespace App\Livewire\Module\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.module.dashboard.dashboard');
    }
}
