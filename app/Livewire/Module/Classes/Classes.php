<?php

namespace App\Livewire\Module\Classes;

use App\Models\Level;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.topadmin')]
class Classes extends Component
{
    #[Validate('required|unique:levels,class_name')]
    public string $class_name ;

    public function submitClass()
    {
        //Check if unique 
        $save = Level::create(['class_name' => $this->class_name]);
    }

    //Delete class 
    public function destroyClass($id)
    {
        //Check if unique 
        $destroy = Level::findOrFail($id);
        $destroy->delete();
    }

    public function render()
    {
        $class = Level::all();
        return view('livewire.module.classes.classes', ['class' => $class]);
    }
}
