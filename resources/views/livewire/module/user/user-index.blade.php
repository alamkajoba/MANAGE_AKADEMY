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
    <div class="justify-content-between card-header py-3 d-flex">
        <form method="GET"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div>
                <h3>LISTE DES AGENTS</h3>
            </div>
        </form>
    </div>

    {{-- table --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                {{-- searchfilter --}}
                <div class="input-group col-lg-4 my-3">
                    <input 
                        wire:model.live="search" 
                        type="text" 
                        class="form-control bg-light small" 
                        placeholder="Taper un nom..."
                    />
                </div>
                
                    
                <thead>
                    <tr style="background-color: rgb(7, 7, 99)" class="text-white">
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Prénom</th>
                        <th>Fonction</th>
                        <th colspan="4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $users)
                        <tr>
                            <td>{{ $users->middle_name }}</td>
                            <td>{{ $users->last_name }}</td>
                            <td>{{ $users->first_name }}</td>
                            <td>{{ $users->getRoleNames()->first(); }}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#detailModal" wire:click="detailUser({{$users->id}})"   href="#" style="background-color: rgb(7, 7, 99)" class="btn text-white">Détails</a>
                            </td>

                            <td>
                                @can('peut assigner permission')
                                    <a href="{{ route('permission.assign', $users->id)}}" style="background-color: rgb(2, 150, 9)" class="btn text-white">Assinger permissions</a>
                                @endcan
                            </td>

                            <td>
                                @can('peut modifier un utilisateur')
                                    <a href="{{ route('user.userupdate', $users->id)}}" style="background-color: rgb(240, 198, 10)" class="btn text-white">Modifier</a>
                                @endcan
                            </td>
                            <td>
                                @can('peut supprimer un utilisateur')
                                    <button 
                                        style="background-color: rgb(207, 32, 32)" 
                                        class="btn text-white"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal" 
                                        wire:click="setUserId({{ $users->id }})"
                                        >
                                        
                                        Supprimer
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-2.5 text-danger whitespace-nowrap text">
                                Oups! Aucun Produit trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>  
        {{-- paginate --}}
        <div class="mt-4">
            {{$user->links()}}
        </div>

        <!-- Modal Delete -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div style="background-color: rgb(7, 7, 99)" class="modal-header text-white rounded-0">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression d'un Utilisateur</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        Cette action est irréversible pour l'Utilisateur 
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button wire:click="destroyUser()" style="background-color: rgb(7, 7, 99)" class="btn text-white" data-bs-dismiss="modal">Confirmer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ModalEnd -->


        <!-- Modal Details -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div style="background-color: rgb(7, 7, 99)" class="modal-header text-white rounded-0">
                        <h5 class="modal-title" id="detailModalLabel">Details sur {{$middle_name}}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <p>Agent: <strong>{{$first_name}} {{$middle_name}} {{$last_name}}</strong></p>
                        <p>Role: <strong>{{ $roleUser }}</strong></p>
                        <p>Permission: 
                            <strong>
                                <ul>
                                    @forelse($permission ?? [] as $perm)
                                        <li>{{ $perm }}</li>
                                    @empty
                                        <li>Aucune permission</li>
                                    @endforelse
                                </ul>
                            </strong>
                        </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button wire:click="destroyUser()" style="background-color: rgb(7, 7, 99)" class="btn text-white" data-bs-dismiss="modal">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ModalEnd -->

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

    // Au chargement du DOM
    document.addEventListener('DOMContentLoaded', function () {
        var exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // bouton qui ouvre le modal
            var UserId = button.getAttribute('data-id'); // récupère l'ID

            // Affiche l'ID dans le modal
            var spanId = exampleModal.querySelector('#UserIdToDelete');
            spanId.textContent = UserId;
        });
    });
</script>