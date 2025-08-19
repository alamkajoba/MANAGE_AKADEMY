<?php

namespace App\Livewire\Module\User;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

#[Layout('layouts.topadmin')]
class UserCreate extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $middle_name = '';
    public string $email = '';
    public string $role = '';
    public string $function = '';
    public string $password = '';


    /**
     * Handle an incoming registration request.
     */
    public function register()
    {

        //Be sure that we have only one function 
        $converteRole = Str::lower(trim($this->role));
        $checkRole = Role::whereRaw('LOWER(name) = ?', [$converteRole])->exists();

        if($checkRole)
        {
            session()->flash('danger', "La fonction ".$this->role." est déjà attribuée ");
            return redirect()->to(route('user.create'));
        }

        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string'],
        ]);
        $create = User::Create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $userRole = Role::firstOrCreate(['name' => $this->role]);
        $create->assignRole($userRole);

        session()->flash('success', "L'utilisateur ".$this->middle_name." ".$this->middle_name." ".$this->middle_name." a été créé avec succès.");
        return redirect()->to(route('user.index'));

    }

    // Enumération du role
    private function role(): array
    {
        return UserRoleEnum::cases();
    }


    public function render()
    {
        return view('livewire.module.user.user-create');
    }
}
