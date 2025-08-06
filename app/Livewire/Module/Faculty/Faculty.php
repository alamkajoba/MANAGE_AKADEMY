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
        $save = Option::create(['faculty_name' => $this->option_name]);
        $this->reset();
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
