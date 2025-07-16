<?php

namespace App\Livewire\Module\Fees;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Schoolfees;

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
        
        $this->updateid = $id;
        $edit=Schoolfees::findOrFail($id);
        $this->feesId=$edit->name;
        $this->name=$edit->name;
        $this->description=$edit->description;
        $this->amount=$edit->amount;

    }
  
    public function edit(){
        $edit = Schoolfees::findOrFail($this->updateid);
        $edit->update([
            'name' => $this->name,
            'description' => $this->description,
            'amount' => $this->amount,
        ]);
      

      session()->flash('success','Frais modifié');
      
    }
  
}
