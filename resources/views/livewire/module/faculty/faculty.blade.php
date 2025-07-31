<div>
    <div class="row">
        <div class="col-lg-6 card mb-3 py-3">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 >AJOUTER UNE OPTION</h3>
                <!-- Barre de recherche -->
            </div>
            <form wire:submit="submitOption()">
                @csrf
                    <label for="middlename">Classe</label>
                    <input 
                        required
                        class="form-control"
                        type="text"
                        placeholder=""
                        wire:model="option_name"
                    >
                    <button type="submit" style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                        Valider
                    </button>
            </form>
        </div>

        <div class="col-lg-6 card mb-3 py-3">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 >LISTE DES OPTIONS</h3>
                <!-- Barre de recherche -->
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead style="background-color: rgb(7, 7, 99)" class="text-white">
                        <tr>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faculty as $faculties)
                            <tr>
                                <td>{{$faculties->faculty_name}}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm"
                                            wire:click="destroyOption({{$faculties->id}})"
                                            title="Supprimer l'étudiant">
                                            Supprimer
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-danger">Oups! Aucun étudiant trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

