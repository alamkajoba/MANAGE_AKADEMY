<?php

namespace App\Livewire\Module\Payment;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PaymentCreate extends Component
{
    public function render()
    {
        return view('livewire.module.payment.payment-create');
    }
}
