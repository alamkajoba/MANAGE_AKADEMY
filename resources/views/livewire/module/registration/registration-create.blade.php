<div class="card shadow mb-4">

    @if (session()->has('danger'))
        <div id="alert-success" 
            class="alert alert-danger fade show text-center"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('danger') }}
        </div>
    @endif
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3 class="m-0 font-weight-bold text-primary">INSCRIPTION</h3>
                </div> 
                <div>
                    <a href="{{ route('registration.index')}}" style="background-color: rgb(7, 7, 99)" class="btn text-white">Voir la liste</a>
                </div>
        </div>
        {{-- table --}}
        <div class="justify-content-between card-header">
            @if ($academicId)
                <form wire:submit="submitStudent()">
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

                                <label for="lastname">Postnom</label>
                                <input 
                                    required
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model="last_name"
                                >

                                <label for="">Prénom</label>
                                <input 
                                    required
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model="first_name"
                                >

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
                            </div>

                            <div class="col-md-6">

                                <label for="">Classe</label>
                                <select 
                                    required
                                        class="form-control"
                                        type="text"
                                        placeholder=""
                                        wire:model="class">
                                    <option wire:model="class">Selection une classe</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{$level->class_name}} ème</option>
                                    @endforeach
                                </select>

                                <label for="">Option</label>
                                <select 
                                    required
                                        class="form-control"
                                        type="text"
                                        placeholder=""
                                        wire:model="option">
                                    <option wire:model="option">Selection une option</option>
                                    @foreach ($options as $option)
                                        <option value="{{ $option->id }}">{{$option->faculty_name}}</option>
                                    @endforeach
                                </select>

                                <label for="">Adresse</label>
                                <input 
                                    required
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model="address"
                                >

                                <label for="">Nom Tuteur</label>
                                <input 
                                    required
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model="tutor_name"
                                >

                                <label for="">Numéro Tuteur</label>
                                <input 
                                    required
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model="phone1"
                                >

                                <label for="">Numéro Tuteur 2</label>
                                <input 
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model="phone2"
                                >
                            </div>
                        </div>
                        <div>
                            <button type="submit" style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                                Valider
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert fade show text-center text-info">Aucune année n'a été initialisée pour l'instant!...</div>
            @endif
        </div>  
</div> 

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('alert-success');
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('show'); // commence la disparition
                setTimeout(() => {
                    alert.remove(); // supprime du DOM après l'animation
                }, 500); // temps pour le fade-out
            }, 5000); // affichée pendant 3 secondes
        }
    });
</script>