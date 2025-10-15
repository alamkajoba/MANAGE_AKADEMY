<div class="card shadow mb-4">
    @if (session()->has('success'))
        <div id="alert-success" 
            class="alert alert-success fade show text-center shadow-lg"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('danger'))
        <div id="alert-success" 
            class="alert alert-danger fade show text-center shadow-lg"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('danger') }}
        </div>
    @endif
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>AJOUTER UN MEMBRE ADMINISTRATIF</h3>
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
            <form wire:submit="register()">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nom</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="middle_name"
                            >

                            <label for="">Postnom</label>
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

                            <label for="">Email</label>
                            <input 
                                required
                                class="form-control"
                                type="email"
                                placeholder=""
                                wire:model="email"
                            >

                            <label for="">Attribuer Role</label>
                            <input 
                                required
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="role"
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
            }, 3000); // affichée pendant 3 secondes
        }
    });
</script>


