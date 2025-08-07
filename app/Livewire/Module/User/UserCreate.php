<?php

namespace App\Livewire\Module\User;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Layout;

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
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'function' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string'],
        ]);
        $create = User::Create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'role' => $this->role,
            'function' => $this->function,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('success', "L'utilisateur a été créé avec succès.");
        return redirect()->to(route('user.create'));

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
