<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>FILTRE DE RECOUVREMENT</h3>
                </div> 
        </div>
        {{-- table --}}
        <div class="justify-content-between card-header">
            <form>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Classe</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >

                            <label for="">Option</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >

                            <label for="">Motif</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >
                        </div>
                    </div>
                    <div>
                        <a href="{{route('recovery.print')}}" style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                            Générer la liste
                        </a>
                    </div>
                </div>
            </form>
        </div>  
</div> 