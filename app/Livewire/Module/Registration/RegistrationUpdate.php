<?php

namespace App\Livewire\Module\Registration;

use App\Enums\GenderEnum;
use App\Models\Level;
use App\Models\Option;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class RegistrationUpdate extends Component
{
    public $stud;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $birth_date;
    public $birth_town;
    public $class;
    public $option;
    public $address;
    public $tutor_name;
    public $phone1;
    public $phone2;

    public $levels;
    public $options;


    protected $rules = [
        'first_name' => 'required|min:3|max:30|regex:/^\S+$/' , 
        'middle_name' => 'required|min:3|max:30|regex:/^\S+$/', 
        'last_name' => 'required|min:3|max:30|regex:/^\S+$/', 
        'gender' => 'required|string|in:M,F', 
        'birth_date' => 'required|date|before_or_equal:today', 
        'birth_town' => 'required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u', 
        'class' => 'required|exists:levels,id', 
        'tutor_name' => 'required|min:3|max:30|regex:/^\S+$/', 
        'phone1' => 'nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:8|max:20', 
        'phone2' => 'nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:8|max:20',
    ];

    public function updateStudent($id)
    {
        $this->validate();
        $check = Student::findOrFail($id);

        $check->update(
        [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'birth_town' => $this->birth_town,
            'address' => $this->address,
            'tutor_name' => $this->tutor_name,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
        ]);
        session()->flash("success", "L'élève a été inscrit avec succès");
        return redirect()->to(route('registration.index'));

    }

    public function mount($id)
    {
        $this->stud = $id;
        $this->levels = Level::all();
        $this->options = Option::all();
        $student = Student::with(['enrollments.level', 'enrollments.option'])->findOrFail($id);;

        $this->first_name = $student->first_name;
        $this->middle_name = $student->middle_name;
        $this->last_name = $student->last_name;
        // $this->gender = $student->gender;
        $this->birth_date = $student->birth_date;
        $this->birth_town = $student->birth_town;

        $enrollment = $student->enrollments->first();
        if ($enrollment) {
            $this->class = $enrollment->level->class_name;
            $this->option = $enrollment->option->faculty_name;
        }
        $this->address = $student->address;
        $this->tutor_name = $student->tutor_name;
        $this->phone1 = $student->phone1;
        $this->phone2 = $student->phone2;
    }


    // Enumération du genre
    private function genders(): array
    {
        return GenderEnum::cases();
    }

    public function render()
    {
        return view('livewire.module.registration.registration-update');
    }
}
