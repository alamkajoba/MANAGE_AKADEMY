<div class="card shadow mb-4">
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
                        <th>Matricule</th>
                        <th>Fonction</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($products as $product) --}}
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>Mac</td>
                            <td>HK231FL</td>
                            <td>Caisse 1</td>
                            <td>
                                {{-- <button class="btn btn-primary">Ajouter</button> --}}
                                <a href="#" style="background-color: rgb(7, 7, 99)" class="btn text-white">Détails</a>
                            </td>
                            <td>
                                {{-- <button class="btn btn-primary">Ajouter</button> --}}
                                <a href="#" style="background-color: rgb(240, 198, 10)" class="btn text-white">Modifier</a>
                            </td>
                            <td>
                                {{-- <button class="btn btn-primary">Ajouter</button> --}}
                                <a href="#" style="background-color: rgb(219, 65, 65)" class="btn text-white">Supprimer</a>
                            </td>
                        </tr>
                    {{-- @empty
                        <tr>
                            <td colspan="5" class="px-6 py-2.5 text-danger whitespace-nowrap text">
                                Oups! Aucun Produit trouvé.
                            </td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>

        </div>  
        {{-- paginate --}}
            <div class="mt-4">
                {{-- {{$products->links()}} --}}
            </div>
    </div>  
</div>  
