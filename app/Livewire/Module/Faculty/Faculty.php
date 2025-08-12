<?php

namespace App\Livewire\Module\Faculty;

use App\Models\Option;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.topadmin')]
class Faculty extends Component
{

    #[Validate('required')]
    public ?string $option_name ;

    public function submitOption()
    {
        $this->validate();

        //Check if unique 
        $exist = Option::where('faculty_name', $this->option_name)->exists();
        if($exist)
        {
            session()->flash('danger', "Cette option a déjà été créée!.");
            return redirect()->to(route('admin.faculty'));
        }
        else
        {
            $save = Option::create(['faculty_name' => $this->option_name]);
            $this->reset();
            session()->flash('success', "Option créée avec succès!.");
            return redirect()->to(route('admin.faculty'));
        }
    }

    public function destroyOption($id)
    {
        $destroy = Option::findOrFail($id);
        $destroy->delete();
    }

    public function render()
    {
        $faculty = Option::all();
        return view('livewire.module.faculty.faculty', ['faculty' => $faculty]);
    }
}
