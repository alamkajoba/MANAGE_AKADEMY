<?php

namespace App\Livewire\Module\User;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.topadmin')]
class UserUpdate extends Component
{
    public string $userId;
    public string $first_name;
    public string $middle_name;
    public string $last_name;
    public string $function;
    public string $email;
    public string $password;
    public string $role;

    public function mount($id)
    {
        $user = User::findOrFail($id);

        //associate
        $this->userId = $user->id;
        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        $this->function = $user->function;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->role = $user->role;
    }

    public function updateUser()
    {
        $user = User::findOrFail($this->userId);
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'function' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        $update = $user->update($validated);
        session()->flash('success', "L'utilisateur a été modifié avec succès.");
        return redirect()->to(route('user.index'));

    }

    public function role()
    {
        return UserRoleEnum::cases();
    }
    public function render()
    {
        return view('livewire.module.user.user-update');
    }
}
