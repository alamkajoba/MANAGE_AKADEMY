<?php

namespace App\Livewire\Module\Fees;

use App\Models\SchoolFee;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[layout('layouts.topadmin')]

class FeesUpdate extends Component
{
    public $name;
    public $description;
    public $amount;
    public $feesId;
    public $edit;
    public $updateid;

    

    public function mount($id){
        
        $edit=SchoolFee::findOrFail($id);
        $this->feesId=$edit->id;
        $this->id=$edit->id;
        $this->name=$edit->name;
        $this->description=$edit->description;
        $this->amount=$edit->amount;

    }
  
    public function editFees(){
       
        $edit=SchoolFee::findOrFail($this->feesId);
        
       $edit->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'amount'=>$this->amount,
    ]);
     session()->flash('success', "Le frais a été modifié avec succès.");
        return redirect()->to(route('fees.index'));
      
    }
  
}
