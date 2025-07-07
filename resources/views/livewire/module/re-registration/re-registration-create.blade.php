<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>RE-INSCRIPTION</h3>
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
            <form>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Selectionner le nom de l'élève</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >

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
