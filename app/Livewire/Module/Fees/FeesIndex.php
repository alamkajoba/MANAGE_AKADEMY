<?php

namespace App\Livewire\Module\Fees;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class FeesIndex extends Component
{
    public function render()
    {
        return view('livewire.module.fees.fees-index');
    }
}
