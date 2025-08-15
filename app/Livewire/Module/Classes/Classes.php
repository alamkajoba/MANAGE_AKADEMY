<?php

namespace App\Livewire\Module\Classes;

use App\Models\Level;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.topadmin')]
class Classes extends Component
{
    #[Validate('required|unique:levels')]
    public string $class_name ;

    public function submitClass()
    {
        //Check if unique 
        $exist = Level::where('class_name', $this->class_name)->exists();
        if($exist)
        {
            session()->flash('danger', "Cette classe existe déjà.");
            return redirect()->to(route('admin.classes'));
        }
        else
        {
            $save = Level::create(['class_name' => $this->class_name]);
            $this->reset();
            session()->flash('success', "Classe créée avec succès.");
            return redirect()->to(route('admin.classes'));
        }
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
