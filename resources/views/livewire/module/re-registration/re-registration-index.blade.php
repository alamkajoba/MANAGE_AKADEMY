<div class="card shadow mb-4">
            <div class="justify-content-between card-header py-3 d-flex">
                <form method="GET"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    {{-- <div class="input-group">
                        @csrf
                        <input id="customername" wire:model="customername" required type="text" class="form-control bg-light small" placeholder="Client name">

                        <input id="table" wire:model='table' type="text" class="form-control bg-light small" placeholder="Table">
                    </div> --}}
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
                                placeholder="Taper un produit ou une catégorie"
                            />
                        </div>
                        
                            
                        <thead>
                            <tr style="background-color: rgb(7, 7, 99)" class="text-white">
                                <th>Catégorie</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Prix (Fc)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse ($products as $product) --}}
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        {{-- <button class="btn btn-primary">Ajouter</button> --}}
                                        <a href="#" style="background-color: rgb(7, 7, 99)" class="btn text-white">Ajouter</a>
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


