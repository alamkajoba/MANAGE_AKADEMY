<div class="card shadow mb-4">
     @if (session()->has('success'))
        <div id="alert-success" 
            class="alert alert-success fade show text-center"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('success') }}
        </div>
    @endif
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>PAIEMENT</h3>
                </div> 
                <div>
                    {{-- <a href="#" style="background-color: rgb(7, 7, 99)" class="btn text-white">Liste</a> --}}
                    <button style="background-color: rgb(7, 7, 99)" class="btn text-white">
                        Voir la liste
                    </button>
                </div>
        </div>
        {{-- table --}}
        <div class="justify-content-between card-header">
            <form wire:submit="SavePayment">
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
                                            {{ $items_students['first_name'].' '. $items_students['middle_name'].' '. $items_students['last_name'].' '.$items_students['code']}}
                                        </a>
                                    @empty
                                        <div class="list-group-item mb-2 flex bg-danger-200">
                                            Aucun(e) Etudiant(e)
                                        </div>
                                    @endforelse
                                </ul>
                            @endif

                            <label for="">Motif de paiement</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="fees"
                                wire:keyup="searchFees"
                            >

                            @if (!empty($items_fees))
                                <ul class="list-group mt-2">
                                    <h5>Resultat de la recherche :</h5>
                                    @forelse ($items_fees as $items_feess)
                                        <a href="" class="list-group-item mb-2 flex bg-primary-200 hover:bg-primary-500"
                                            wire:click.prevent="selectFees({{$items_feess['id']}})">
                                            {{ $items_feess['name'].' '. $items_feess['description'].' '.$items_feess['amount'].' Fc'}}
                                        </a>
                                    @empty
                                        <div class="list-group-item mb-2 flex bg-danger-200">
                                            Aucun(e) Etudiant(e)
                                        </div>
                                    @endforelse
                                </ul>
                            @endif
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

