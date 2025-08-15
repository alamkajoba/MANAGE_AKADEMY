<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3 class="m-0 font-weight-bold text-primary">RE-INSCRIPTION</h3>
                </div> 
                <div>
                    {{-- <a href="#" style="background-color: rgb(7, 7, 99)" class="btn text-white">Liste</a> --}}
                    <a href="{{ route('registration.index')}}" style="background-color: rgb(7, 7, 99)" class="btn text-white">
                        Voir la liste
                    </a>
                </div>
        </div>
        {{-- table --}}
        <div class="justify-content-between card-header">
            <form>
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Selectionner le nom de l'élève</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="search"
                                wire:keyup="searchStundent"
                            >
                            @if (!empty($items_student))
                                <ul class="list-group mt-2">
                                    <h5>Resultat de la recherche :</h5>
                                    @forelse ($items_student as $items_students)
                                        <a href="" class="list-group-item mb-2 flex bg-primary-200 hover:bg-primary-500"
                                            wire:click.prevent="selectStudent({{$items_students['id']}})">
                                            {{ $items_students['first_name'].' '. $items_students['last_name'].' '.$items_students['code']}}
                                        </a>
                                    @empty
                                        <div class="list-group-item mb-2 flex bg-danger-200">
                                            Aucun(e) Etudiant(e)
                                        </div>
                                    @endforelse
                                </ul>
                            @endif

                            <label for="">Classe</label>
                            <select wire:model="" class="form-control">
                                <option value="">Selectionner une classe</option>
                                @foreach ($classe as $classes)
                                    <option value="{{ $classes->id }}">{{ $classes->class_name }} ème</option>
                                @endforeach
                            </select>

                            <label for="">Option</label>
                            <select wire:model="" class="form-control">
                                <option value="">Selectionner une option</option>
                                @foreach ($option as $options)
                                    <option value="{{ $options->id }}">{{ $options->faculty_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div>
                        <button style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                            Valider
                        </button>
                    </div>
                </div>
            </form>
        </div>  
</div> 
