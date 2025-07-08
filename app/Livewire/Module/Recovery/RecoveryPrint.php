<?php

namespace App\Livewire\Module\Recovery;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class RecoveryPrint extends Component
{
    public function render()
    {
        return view('livewire.module.recovery.recovery-print');
    }
}
