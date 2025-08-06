<?php

namespace App\Livewire\Module\Fees;

use App\Models\SchoolFee;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.topadmin')]
class FeesIndex extends Component
{
    public function render()
    {
         $fees = SchoolFee::all();
        return view('livewire.module.fees.fees-index', ['fees' => $fees]);
    }
    public function deletefees(SchoolFee $schoolfess){
        $schoolfess->delete();
        session()->flash('success', 'Frais supprimé');
        return view('livewire.module.fees.fees-index');

    }

}
