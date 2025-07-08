<?php

namespace App\Livewire\Module;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleManager extends Component
{
    public $users, $roles;
    public $selectedUser, $selectedRoles = [];

    public function mount()
    {
        $this->users = User::all();
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.user-role-manager');
    }

    public function updatedSelectedUser($userId)
    {
        $user = User::findOrFail($userId);
        $this->selectedRoles = $user->roles->pluck('id')->toArray();
    }

    public function save()
    {
        $user = User::findOrFail($this->selectedUser);
        $user->syncRoles($this->selectedRoles);
        session()->flash('message', "Rôles mis à jour pour l'utilisateur.");
    }
}

