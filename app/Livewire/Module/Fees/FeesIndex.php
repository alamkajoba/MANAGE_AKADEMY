<?php

namespace App\Livewire\Module\Fees;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Schoolfees;

#[Layout('layouts.topadmin')]
class FeesIndex extends Component
{
    public function render()
    {
         $fees = Schoolfees::all();
        return view('livewire.module.fees.fees-index', ['fees' => $fees]);
    }
    public function deletefees(Schoolfees $schoolfess){
        $schoolfess->delete();
        session()->flash('success', 'Frais supprimé');
        return view('livewire.module.fees.fees-index');

    }

}
