<div class="card shadow mb-4">
            <div class="justify-content-between card-header py-3 d-flex">
                <form method="GET"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div>
                        <h3>LISTE </h3>
                    </div>
                </form>
                    <div class="col-auto">
                        <button onclick="window.print()" style="background-color: rgb(7, 7, 99)" class="btn text-white">
                            <i class="fa fa-print"></i>
                            Imprimer
                        </button>
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
            <div id="print-section" class="card-body">
                <center>Liste des élèves (classe) non en ordre avec (Frais)</center>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                        <thead>
                            <tr style="background-color: rgb(7, 7, 99)" class="text-white">
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>Prénom</th>
                                <th>Classe</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse ($products as $product) --}}
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>Mac</td>
                                    <td>5</td>
                                    <td>Biologie Chimie</td>
                                </tr>

                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>Mac</td>
                                    <td>5</td>
                                    <td>Biologie Chimie</td>
                                </tr>

                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>Mac</td>
                                    <td>5</td>
                                    <td>Biologie Chimie</td>
                                </tr>

                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>Mac</td>
                                    <td>5</td>
                                    <td>Biologie Chimie</td>
                                </tr>

                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>Mac</td>
                                    <td>5</td>
                                    <td>Biologie Chimie</td>
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
            </div>  
    <style>
        @media print {
            body * {
                visibility: hidden;
                margin: 0%;
            }

            #print-section,
            #print-section * {
                visibility: visible;
                
            }

            #print-section {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                color: black;
            }

            .no-print {
                display: none !important;
            }

            hr {
                border: none;
                border-top: 1px solid black;
                margin: 5px 0;
            }
        }
    </style>
        </div>  
