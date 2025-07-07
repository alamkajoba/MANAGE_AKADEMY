<?php

namespace App\Livewire\Module\Recovery;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class RecoveryCreate extends Component
{
    public function render()
    {
        return view('livewire.module.recovery.recovery-create');
    }
}
