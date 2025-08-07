<div class="card shadow mb-4">
    {{-- @if (session()->has('success'))
        <div id="alert-success" class="alert alert-success mt-3 text-white" role="alert">
            {{ session('success') }}
        </div>
    @endif --}}

    @if (session()->has('success'))
        <div id="alert-success" 
            class="alert alert-success fade show text-center"
            role="alert"
            style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    z-index: 9999; width: fit-content; min-width: 500px;">
            {{ session('success') }}
        </div>
    @endif
    <!-- Header -->
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 >LISTE DES ELEVES</h3>
        <!-- Barre de recherche -->
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
                            @foreach ($students->enrollments as $enrollment)
                                <td>
                                    {{ $enrollment->level->class_name }} ème
                                </td>
                            @endforeach
                            @foreach ($students->enrollments as $enrollment)
                                <td>
                                    {{ $enrollment->option->faculty_name }} 
                                </td>
                            @endforeach
                            <td>
                                <a href="{{ route('registration.update', $students->id)}}" class="btn btn-warning btn-sm" title="Modifier l'étudiant">Modifier</a>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                        wire:click="deleteStudent({{ $students->id }})">
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

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('alert-success');
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('show'); // déclenche l'animation fade
                setTimeout(() => {
                    alert.remove(); // supprime l'élément du DOM
                }, 500); // attendre l'animation
            }, 5000); // visible secondes
        }
    });
</script>
 