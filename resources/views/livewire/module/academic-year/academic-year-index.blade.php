<div>
    <!-- Notification flash -->

    @if (session()->has('success'))
        <div id="alert-success" 
            class="alert alert-success fade show text-center shadow-lg"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6 card mb-3 py-3">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 >AJOUTER UNE ANNEE SCOLAIRE</h3>
                <!-- Barre de recherche -->
            </div>
            <form wire:submit="submitAcademic()">
                @csrf
                    <label for="middlename">Debut</label>
                    <input 
                        required
                        class="form-control"
                        type="text"
                        placeholder="Exemple: 2025"
                        wire:model="start_date"
                    >
                    <label for="middlename">Fin</label>
                    <input 
                        required
                        class="form-control"
                        type="text"
                        placeholder="Exemple: 2026"
                        wire:model="end_date"
                    >

                    <button type="submit" style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                        Créer
                    </button>
            </form>
        </div>

        <div class="col-lg-6 card mb-3 py-3">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 >PALMARES DES ANNEES</h3>
                <!-- Barre de recherche -->
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead style="background-color: rgb(7, 7, 99)" class="text-white">
                        <tr>
                            <th>Année Scolaire</th>
                            <th>Statut</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($academic as $academics)
                            <tr>
                                <td>{{$academics->start_date}}-{{$academics->end_date}}</td>
                                <td>{{$academics->status}}</td>
                                <td>
                                    @if ($academics->status === 'passée' || $academics->status === 'active')
                                        <button class="btn btn-info btn-sm"
                                                wire:click=""
                                                title="Supprimer l'étudiant">
                                                Palmarès
                                        </button>
                                    @endif
                                    @if ($academics->status === 'inactive')
                                        --NULL--
                                    @endif
                                </td>
                                <td>
                                    @if ($academics->status === 'inactive')
                                        <button class="btn btn-success btn-sm"
                                                wire:click="activeAcademic({{ $academics->id }})"
                                                title="Supprimer l'étudiant">
                                                Activer n'année
                                        </button>
                                    @endif
                                    @if ($academics->status === 'passée' || $academics->status === 'active')
                                        --NULL--
                                    @endif
                                </td>
                                <td>
                                    @can('peut supprimer une année')
                                        <button class="btn btn-danger btn-sm"
                                                wire:click=""
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteAcademicModal"
                                                title="Supprimer l'étudiant">
                                                Supprimer
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-danger">Oups! Aucune année trouvée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            <!-- Modal delete academic -->
            <div class="modal fade" id="deleteAcademicModal" tabindex="-1" aria-labelledby="deleteAcademicModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0">
                        <div style="background-color: rgb(7, 7, 99)" class="modal-header text-white rounded-0">
                            <h5 class="modal-title" id="deleteAcademicModalLabel">Confirmer l'action</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulaire de connexion -->
                            <form >
                                <div class="mb-3">
                                    <label for="username" class="form-label">Identifiant</label>
                                    <input type="text" id="username" class="form-control" wire:model.defer="username" required autocomplete="off" >
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" id="password" class="form-control" wire:model.defer="password" required autocomplete="off">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button 
                                style="background-color: rgb(7, 7, 99)" 
                                class="btn text-white"
                            >
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ModalEnd -->
            </div>
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

    // Au chargement du DOM
    document.addEventListener('DOMContentLoaded', function () {
        var exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // bouton qui ouvre le modal
            var studentId = button.getAttribute('data-id'); // récupère l'ID

            // Affiche l'ID dans le modal
            var spanId = exampleModal.querySelector('#studentIdToDelete');
            spanId.textContent = studentId;
        });
    });
</script>


