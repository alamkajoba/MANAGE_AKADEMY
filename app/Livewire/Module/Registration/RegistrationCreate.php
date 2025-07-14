<?php

namespace App\Livewire\Module\Registration;

use App\Enums\GenderEnum;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.app')]
class RegistrationCreate extends Component
{

    public $code;

    #Rules validations

    #[Validate('required|min:3|max:30|regex:/^\S+$/')]
    public string $first_name = '';

    #[Validate('required|min:3|max:30|regex:/^\S+$/')]
    public string $middle_name = '';

    #[Validate('required|min:3|max:30|regex:/^\S+$/')]
    public string $last_name = '';

    #[Validate('required|string|in:M,F')]
    public string $gender = '';

    #[Validate('required|date|before_or_equal:today')]
    public string $birth_date = '';

    #[Validate('required|min:5|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public string $birth_town = '';

    #[Validate('required|min:1|max:2|regex:/^\S+$/')]
    public string $class = '';

    #[Validate('required|min:5|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public string $option = '';

    #[Validate('required|min:5|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public string $address = '';

    #[Validate('required|min:3|max:30|regex:/^\S+$/')]
    public string $tutor_name = '';

    #[Validate('required|regex:/^[0-9\s\-\+\(\)]+$/|min:8|max:20')]
    public string $phone1 = '';

    #[Validate('regex:/^[0-9\s\-\+\(\)]+$/|min:8|max:20')]
    public string $phone2 = '';

    #Matricule
    private function matriculeMaker()
    {
        $find = Student::count();
        $find2 = $find + 1;
        $this->code = 'MAT'.$find2.'STU2025';
        return $this->code;
    }

    #Data Student
    private function dataStudent()
    {
        return [
            'first_name' => $this->first_name ,
            'middle_name' => $this->middle_name ,
            'last_name' => $this->last_name ,
            'gender' => $this->gender ,
            'birth_date' => $this->birth_date ,
            'birth_town' => $this->birth_town ,
            'address' => $this->address ,
            'class' => $this->class ,
            'option' => $this->option ,
            'tutor_name' => $this->tutor_name ,
            'phone1' => $this->phone1 ,
            'phone2' => $this->phone2 ,
            'code' => $this->matriculeMaker() ,
        ];
    }

    #Unique Stundent
    private function uniqueStudent()
    {
        return Student::query()
            ->where('first_name', $this->first_name)
            ->where('last_name', $this->last_name)
            ->where('birth_date', $this->birth_date)
            ->exists();
    }

    #Create Student
    public function submitStudent()
    {
        $this->validate();

        if ($this->uniqueStudent()) {
            $this->addError('exist', 'Un Elève avec ces informations existe déjà.');
            return;
        }

        // Creation du patient
        $Student = Student::create($this->dataStudent());

        // Notification
        $this->dispatch('notify', message: "L'élève a été inscrit avec succès", type: 'succès');
        $this->redirect(route('registration.index'));
    }

    #Pull GenderEnum
    private function genders(): array
    {
        return GenderEnum::cases();
    }


    public function render()
    {
        return view('livewire.module.registration.registration-create');
    }
}
