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

    @if (session()->has('danger'))
        <div id="alert-success" 
            class="alert alert-danger fade show text-center shadow-lg"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('danger') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6 card mb-3 py-3">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 >AJOUTER UNE CLASSE</h3>
                <!-- Barre de recherche -->
            </div>
            <form wire:submit="submitClass()">
                @csrf
                    <label for="middlename">Classe</label>
                    <input 
                        required
                        class="form-control"
                        type="text"
                        placeholder=""
                        wire:model="class_name"
                    >
                    <button type="submit" style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                        Valider
                    </button>
            </form>
        </div>

        <div class="col-lg-6 card mb-3 py-3">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h3 >LISTE DES CLASSES</h3>
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
                        @forelse ($class as $classes)
                            <tr>
                                <td>{{$classes->class_name}} ème</td>
                                <td>
                                    <button class="btn btn-danger btn-sm"
                                            wire:click="destroyClass({{$classes->id}})"
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
