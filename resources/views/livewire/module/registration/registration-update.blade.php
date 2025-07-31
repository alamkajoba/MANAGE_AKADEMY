<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3 class="m-0 font-weight-bold text-primary">MODIFICATION DES IDENTITES DE : {{$first_name}} {{$middle_name}} {{$last_name}}</h3>
                </div> 
                <div>
                    <a href="{{ route('registration.index')}}" style="background-color: rgb(7, 7, 99)" class="btn text-white">Voir la liste</a>
                </div>
        </div>
        {{-- table --}}
        <div class="justify-content-between card-header">
            <form wire:submit="updateStudent({{$stud}})">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="middlename">Nom</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="middle_name"
                            >
                            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror

                            <label for="lastname">Postnom</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="last_name"
                            >
                            @error('middle_name') <span class="text-danger">{{ $message }}</span> @enderror

                            <label for="">Prénom</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="first_name"
                            >
                            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror

                            <label for="">Genre</label>
                            <select wire:model="gender" class="form-control">
                                <option>Selectionner...</option>
                                @foreach ($this->genders() as $gender)
                                    <option value="{{ $gender }}">{{ $gender }}</option>
                                @endforeach
                            </select>

                            <label for="">Date de naissance</label>
                            <input 
                                required
                                class="form-control"
                                type="date"
                                placeholder=""
                                wire:model="birth_date"
                            >

                            <label for="">Lieu de naissance</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="birth_town"
                            >
                            @error('birth_town') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">

                            <label for="">Adresse</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="address"
                            >
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror

                            <label for="">Nom Tuteur</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="tutor_name"
                            >
                            @error('tutor_name') <span class="text-danger">{{ $message }}</span> @enderror

                            <label for="">Numéro Tuteur</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="phone1"
                            >
                            @error('phone1') <span class="text-danger">{{ $message }}</span> @enderror

                            <label for="">Numéro Tuteur 2</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="phone2"
                            >
                            @error('phone2') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit" style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                            Valider
                        </button>
                    </div>
                </div>
            </form>
        </div>  
</div> 

