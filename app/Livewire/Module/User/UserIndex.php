<?php

namespace App\Livewire\Module\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class UserIndex extends Component
{

    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    #[Url(as: 'q')]
    public ?string $search = '';

    //Var deleteUser
    public $UserIdToDelete = '';


    // Var detailUser
    public $first_name ='';
    public $middle_name ='';
    public $last_name ='';
    public $permission;
    public $createUser ='';
    public $roleUser ='';


    protected $listeners = [
        'setUserId',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }


    // Reçoit l'ID envoyé par JS à l'ouverture du modal
    public function setUserId($id)
    {
        $this->UserIdToDelete = $id;
    }

    public function destroyUser()
    {
        $user = User::findOrFail($this->UserIdToDelete);
        $user->delete();
        session()->flash('success', "L'utilisateur a été supprimé avec succès.");
        return redirect()->to(route('user.index'));
    }


    public function detailUser($id)
    {
        $user = User::with('roles', 'permissions')->findOrFail($id);

        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;

        // Récupérer tous les rôles (en array ou collection)
        $this->roleUser = $user->getRoleNames()->first();

        // Permissions directes + héritées
        $this->permission = $user->getAllPermissions()->pluck('name')->toArray() ?? [];

    }


    public function render()
    {
        $query = User::where('id', '!=', 1)
            ->where(function ($q) {
                if ($this->search) {  // Vérifiez si $this->search a une valeur
                    $q->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('role', 'like', '%' . $this->search . '%')  // Assurez-vous que 'role' existe bien dans votre table
                        ->orWhere('function', 'like', '%' . $this->search . '%');
                }
            });

        return view('livewire.module.user.user-index',[
                'user' => $query->latest()->paginate(5),
            ]);
    }
}
