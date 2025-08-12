<div class="card shadow mb-4">

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

    <!-- Header -->
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3>LISTE DES ELEVES</h3>
        <div class="col-lg-4">
            <input 
                wire:model.live="search" 
                type="text" 
                class="form-control bg-light small"
                placeholder="Taper un nom..."
                aria-label="Recherche élève"
            />
        </div>
    </div>

    <!-- Table -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead style="background-color: rgb(7, 7, 99)" class="text-white">
                    <tr>
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Prénom</th>
                        <th>Matricule</th>
                        <th>Classe</th>
                        <th>Option</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($student as $students)
                        <tr>
                            <td>{{ $students->first_name }}</td>
                            <td>{{ $students->middle_name }}</td>
                            <td>{{ $students->last_name }}</td>
                            <td>{{ $students->code }}</td>

                            @foreach ($students->enrollment as $enrollments)
                                <td>{{ $enrollments->level->class_name }} ème</td>
                            @endforeach
                            @foreach ($students->enrollment as $enrollments)
                                <td>{{ $enrollments->option->faculty_name }}</td>
                            @endforeach
                            <td>
                                <a href="{{ route('registration.update', $students->id) }}" class="btn btn-warning btn-sm" title="Modifier l'étudiant">Modifier</a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" 
                                    wire:click="setStudentId({{ $students->id }})"
                                    >
                                    
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

        <!-- Pagination -->
        <div class="mt-4">
            {{ $student->links() }}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div style="background-color: rgb(7, 7, 99)" class="modal-header text-white rounded-0">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression d'un Etudiant</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        Cette action est irréversible pour l'étudiant 
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                       
                        <button wire:click="destroyStudent()" style="background-color: rgb(7, 7, 99)" class="btn text-white" data-bs-dismiss="modal">Confirmer</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- ModalEnd -->
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

