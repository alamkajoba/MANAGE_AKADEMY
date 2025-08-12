<?php
namespace App\Livewire\Module\Registration;

use App\Enums\AcademicYearStatus;
use App\Enums\GenderEnum;
use App\Models\AcademicYear;
use App\Models\Enrollment;
use App\Models\Level;
use App\Models\Option;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.app')]
class RegistrationCreate extends Component
{
    // Champs liés à l'étudiant
    public $code;

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

    #[Validate('required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public string $birth_town = '';

    #[Validate('required|exists:levels,id')]
    public $class;

    #[Validate('required|exists:options,id')]
    public $option;

    #[Validate('required|min:3|max:100|regex:/^[\pL\pN\s,\.\-#\/]+$/u')]
    public string $address = '';

    #[Validate('required|min:3|max:30|regex:/^\S+$/')]
    public string $tutor_name = '';

    #[Validate('required|regex:/^[0-9\s\-\+\(\)]+$/|min:8|max:20')]
    public string $phone1 = '';

    #[Validate('nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:8|max:20')]
    public string $phone2 = '';

    // Données pour le formulaire
    public $levels;
    public $options;

    // Génération du matricule
    private function matriculeMaker(): string
    {
        $count = Student::count() + 1;
        return 'MAT-' . $count . '-STU-2025';
    }

    // Données à enregistrer pour Student
    private function dataStudent(): array
    { 
        return [
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
            'code' => $this->matriculeMaker(),
        ];
    }

    // Vérification d'unicité
    private function uniqueStudent(): bool
    {
        return Student::where('first_name', $this->first_name)
            ->where('last_name', $this->last_name)
            ->where('birth_date', $this->birth_date)
            ->exists();
    }

    // Enregistrement principal
    public function submitStudent()
    {
        $this->validate();

        if ($this->uniqueStudent()) {
            $this->addError('exist', 'Un Elève avec ces informations existe déjà.');
            return;
        }

        //Select current year
        $academic_id = AcademicYear::where('status', AcademicYearStatus::CURRENT->value)->value('id');

        if($academic_id)
        {
            $student = Student::create($this->dataStudent());
            Enrollment::create([
                'student_id' => $student->id,
                'level_id' => (int)$this->class,
                'option_id' => (int)$this->option,
                'academic_year_id' => $academic_id
            ]);
            session()->flash('success', "L'étudiant a été créé avec succès.");
            return redirect()->to(route('registration.index'));
        }
        else{
            session()->flash('danger', "Aucune année n'a été initialisée pour l'instant.");
            return redirect()->to(route('registration.create'));
        }
    }

    // Enumération du genre
    private function genders(): array
    {
        return GenderEnum::cases();
    }

    // Chargement des données pour les selects
    public function mount()
    {
        $this->levels = Level::all();
        $this->options = Option::all();
    }

    // Rendu du composant
    public function render()
    {
        return view('livewire.module.registration.registration-create', [
            'genders' => $this->genders(),
        ]);
    }
}
