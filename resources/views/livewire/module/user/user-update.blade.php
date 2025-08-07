<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>MODIIFIER {{ $first_name }} {{ $middle_name }} {{ $last_name }}</h3>
                </div> 
        </div>
        {{-- table --}}
        <div class="justify-content-between card-header">
            <form wire:submit="updateUser()">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nom</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="middle_name"
                            >

                            <label for="">Postnom</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="last_name"
                            >

                            <label for="">Prénom</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="first_name"
                            >

                            <label for="">Email</label>
                            <input 
                                class="form-control"
                                type="email"
                                placeholder=""
                                wire:model="email"
                            >

                            <label for="">Rôle</label>
                            <select wire:model="role" class="form-control">
                                <option>Selectionner...</option>
                                @foreach ($this->role() as $roles)
                                    <option value="{{ $roles }}">{{ $roles }}</option>
                                @endforeach
                            </select>

                            <label for="">Fonction</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="function"
                            >
                        </div>

                        <div class="col-md-6">
                            <label for="">Mot de passe</label>
                            <input 
                                class="form-control"
                                type="password"
                                placeholder=""      
                                wire:model="password"
                            >
                        </div>
                    </div>
                    <div>
                        <button style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                            Modifier
                        </button>
                    </div>
                </div>
            </form>
        </div>  
</div> 





