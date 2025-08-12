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
                    <h3>AJOUTER UN FRAIS</h3>
                </div> 
                <div>
                    <a href="#" style="background-color: rgb(7, 7, 99)" class="btn text-white">Liste la liste</a>
                </div>
        </div>
        {{-- table --}}
        <div class="justify-content-between card-header">
            <form wire:submit="save">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nom du frais</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="name"
                            >
                            <div>@error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <label for="">Description</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="description"
                            >
                            <div>@error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <label for="">Montant</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="amount"
                            >
                            <div>@error('amount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
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
