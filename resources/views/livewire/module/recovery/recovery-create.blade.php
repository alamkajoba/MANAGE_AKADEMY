<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>FILTRE DE RECOUVREMENT</h3>
                </div> 
                <div>
                    <button style="background-color: rgb(7, 7, 99)" class="btn text-white fa fa-print">Imprimer</button>
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
                    <tr><td colspan="4">Liste des etudiants en ordre avec .............</td></tr>
                    <tr style="background-color: rgb(7, 7, 99)" class="text-white">
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Prénom</th>
                        <th>Matricule</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recovery as $recoveries)
                        <tr>
                            <td>{{$recoveries->id}}</td>
                            <td>{{$recoveries->enrollment_id}}</td>
                            <td>{{$recoveries->fees_id}}</td>
                            <td>HUYHGIUOUB</td>
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
                {{-- {{$products->links()}} --}}
            </div>
    </div>  
</div> 