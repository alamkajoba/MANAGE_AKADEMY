<?php

namespace App\Livewire\Module\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.topadmin')]
class UserIndex extends Component
{

    use WithPagination;
    use WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';

    #[Url(as: 'q')]
    public ?string $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', "L'utilisateur a été supprimé avec succès.");

        return redirect()->to(route('user.index'));
    }
    public function render()
    {

        $query = User::where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');

        return view('livewire.module.user.user-index',[
                'user' => $query->latest()->paginate(5),
            ]);
    }
}
