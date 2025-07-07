<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>AJOUTER UN MEMBRE ADMINISTRATIF</h3>
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
                            <label for="">Nom</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >

                            <label for="">Postnom</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >

                            <label for="">Prénom</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >

                            <label for="">Genre</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >

                            <label for="">Role</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >

                            <label for="">Fonction</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model=""
                            >
                        </div>

                        <div class="col-md-6">
                            <label for="">Adresse</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""      
                                wire:model=""
                            >

                            <label for="">Phone</label>
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


