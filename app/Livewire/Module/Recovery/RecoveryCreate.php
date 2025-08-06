<?php

namespace App\Livewire\Module\Recovery;

use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class RecoveryCreate extends Component
{
    public function render()
    {
        $recovery = Payment::all();
        return view('livewire.module.recovery.recovery-create', ['recovery' => $recovery]);
    }
}
