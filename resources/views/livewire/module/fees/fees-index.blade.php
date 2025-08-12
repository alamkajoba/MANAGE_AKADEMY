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
                                <td><button wire:click="deletefees({{$fes->id}})"  wire:confirm="voulez-vous vraiment supprimé?" class="btn btn-danger">Supprimer</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>

                </div>  
                {{-- paginate --}}
                    <div class="mt-4">
                        {{-- {{$fees->links()}} --}}
                    </div>
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