<?php

namespace App\Livewire\Module\Permissions;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

#[Layout('layouts.topadmin')]
class AssignPermission extends Component
{

    use WithPagination;
    use WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $role;
    public $selectedPermissions = [];
    public $userId;

    public function mount($id)
    {
        $this->userId = $id;
        $user = User::findOrFail($id);

        $this->role = $user->getRoleNames()->first();
        $this->name = $user->middle_name.' '.$user->last_name.' '.$user->first_name;

    }

    public function save()
    {
        $user = User::findOrFail($this->userId);

        // Valider au moins une permission
        $this->validate([
            'selectedPermissions' => 'required|array|min:1',
        ]);

        // Assigner les permissions sélectionnées
        $user->givePermissionTo($this->selectedPermissions);

        session()->flash('success', 'Permissions mises à jour avec succès !');
        return redirect()->to(route('user.index'));
    }

    // Méthode pour cocher/décocher
    public function togglePermission($id)
    {
        if (in_array($id, $this->selectedPermissions)) {
            $this->selectedPermissions = array_diff($this->selectedPermissions, [$id]);
        } else {
            $this->selectedPermissions[] = $id;
        }
    }

    public function render()
    {
        $permissionsGrouped = Permission::paginate(10);
        return view('livewire.module.permissions.assign-permission',['permissionsGrouped'=> $permissionsGrouped]);
    }
}

