<?php

namespace App\Livewire\Module;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionManager extends Component
{
    public $permissions, $name, $permission_id;
    public $isEditing = false;

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function render()
    {
        return view('livewire.permission-manager');
    }

    public function resetInput()
    {
        $this->name = '';
        $this->permission_id = null;
        $this->isEditing = false;
    }

    public function create()
    {
        $this->validate(['name' => 'required|unique:permissions,name']);
        Permission::create(['name' => $this->name]);
        $this->resetInput();
        $this->mount();
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $this->permission_id = $id;
        $this->name = $permission->name;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate(['name' => 'required|unique:permissions,name,' . $this->permission_id]);
        Permission::findOrFail($this->permission_id)->update(['name' => $this->name]);
        $this->resetInput();
        $this->mount();
    }

    public function delete($id)
    {
        Permission::findOrFail($id)->delete();
        $this->mount();
    }
}

