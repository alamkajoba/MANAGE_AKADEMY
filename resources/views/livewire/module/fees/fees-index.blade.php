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
                <form method="GET"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div>
                        <h3>LISTE DES FRAIS</h3>
                    </div>
                </form>
                    <div class="col-auto">
                    </div>
                        <!-- confirm modal Modal-->
                        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmer la commande / Total:Fc</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <form method="GET">
                                                @csrf
                                                <input wire:model="customername" id="customername"  placeholder="Client name" class="form-control bg-light small" type="text">
                                                <input wire:model="table" id="table" placeholder="Table" class="form-control bg-light small" type="text">
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button wire:click="destroyCart()" class="btn btn-danger mx-auto" type="button" data-dismiss="modal">Annuler</button>
                                        <button wire:click="submitOrder()" class="btn btn-success mx-auto" type="submit">Valider</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>

            {{-- table --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                        {{-- searchfilter --}}
                        <div class="input-group col-lg-4 my-3">
                            <input 
                                wire:model.live.debounce.100ms="search" 
                                type="text" 
                                class="form-control bg-light small" 
                                placeholder="Taper un nom..."
                            />
                        </div>
                        
                            
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Montant</th>
                           
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fees as $fes)
                            <tr>
                                <td>{{$fes->id}}</td>
                                <td>{{ucwords($fes->name)}}</td>
                                <td>{{$fes->description}}</td>
                                <td>{{$fes->amount}}</td>
                                <td><button class="btn btn-info">Détail</button></td>
                                <td><a href="{{route('fees.update',$fes->id)}}" class="btn btn-success">Modifier</a></td>
                                <td><button wire:click="setFeesId({{$fes->id}})"  data-bs-toggle="modal" data-bs-target="#deleteFeesModal" class="btn btn-danger">Supprimer</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>

                </div>  
                {{-- paginate --}}

            </div> 

            
        <!-- Modal delete student -->
        <div class="modal fade" id="deleteFeesModal" tabindex="-1" aria-labelledby="deleteFeesModal" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div style="background-color: rgb(7, 7, 99)" class="modal-header text-white rounded-0">
                        <h5 class="modal-title" id="deleteFeesModal">Confirmer l'action</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulaire de connexion -->
                        <form wire:submit.prevent="destroyFee">
                            <div class="mb-3">
                                <label for="username" class="form-label">Identifiant</label>
                                <input type="text" class="form-control" wire:model.defer="user" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" wire:model.defer="password" required autocomplete="off">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button 
                            wire:click="destroyFee" 
                            style="background-color: rgb(7, 7, 99)" 
                            class="btn text-white"
                        >
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ModalEnd -->


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