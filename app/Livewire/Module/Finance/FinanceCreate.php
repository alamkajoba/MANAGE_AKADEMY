<?php

namespace App\Livewire\Module\Finance;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Finance;


#[Layout('layouts.app')]

class FinanceCreate extends Component
{
    public $description;
    public $amount;

    public function saveDepense()
    {
        $this->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
        ]);

        Finance::create([
            'description' => $this->description,
            'amount' => $this->amount,
        ]);

        session()->flash('success', 'Dépense enregistrée avec succès !');
        $this->reset(['description', 'amount']);
    }

    public function render()
    {
        return view('livewire.module.finance.finance-create');
    }
}
