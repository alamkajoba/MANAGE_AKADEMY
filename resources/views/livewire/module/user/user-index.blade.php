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
                        wire:model.live.debounce.100ms="search" 
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
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $users)
                        <tr>
                            <td>{{ $users->middle_name }}</td>
                            <td>{{ $users->last_name }}</td>
                            <td>{{ $users->first_name }}</td>
                            <td>{{ $users->function }} 1</td>
                            <td>
                                {{-- <button class="btn btn-primary">Ajouter</button> --}}
                                <a href="#" style="background-color: rgb(7, 7, 99)" class="btn text-white">Détails</a>
                            </td>
                            <td>
                                {{-- <button class="btn btn-primary">Ajouter</button> --}}
                                <a href="{{ route('user.userupdate', $users->id)}}" style="background-color: rgb(240, 198, 10)" class="btn text-white">Modifier</a>
                            </td>
                            <td>
                                {{-- <button class="btn btn-primary">Ajouter</button> --}}
                                <a href="#" style="background-color: rgb(219, 65, 65)" class="btn text-white">Supprimer</a>
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