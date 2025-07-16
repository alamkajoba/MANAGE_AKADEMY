<div class="card shadow mb-4">

    <!-- Header -->
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">LISTE DES ELEVES</h3>
        <!-- Barre de recherche -->
        <div class="col-lg-4">
            <input 
                wire:model.debounce.300ms="search" 
                type="text" 
                class="form-control bg-light small"
                placeholder="Taper un nom..."
                aria-label="Recherche élève"
            />
        </div>
    </div>

    <!-- Table -->
    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

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
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($student as $students)
                        <tr>
                            <td>{{ $students->first_name }}</td>
                            <td>{{ $students->middle_name }}</td>
                            <td>{{ $students->last_name }}</td>
                            <td>{{ $students->code }}</td>
                            <td>{{ $students->class }}</td>
                            <td>{{ $students->option }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" title="Voir les détails">Détails</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" title="Modifier l'étudiant">Modifier</a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                        wire:click="deleteStudent({{ $students->id }})"
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

        <!-- Pagination -->
        <div class="mt-4">
            {{ $student->links() }}
        </div>
    </div>

    {{-- @push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
        Livewire.on('confirm', ({ title, text, id, method }) => {
            console.log("Émission de l'événement :", method, id); 

            Swal.fire({
                title: title || 'Êtes-vous sûr ?',
                text: text || '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed && id && method) {
                    window.Livewire.dispatch(method, id);

                }
            });
        });

        Livewire.on('toast', ({ type, message }) => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type || 'success',
                title: message || '',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            });
        });
    });

    </script>
    @endpush --}}



</div>
 