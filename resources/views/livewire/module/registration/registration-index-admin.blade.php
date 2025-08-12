<div class="card shadow mb-4">
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
                                <td>
                                    {{ $enrollments->level->class_name }} ème
                                </td>
                            @endforeach
                            @foreach ($students->enrollment as $enrollments)
                                <td>
                                    {{ $enrollments->option->faculty_name }} 
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">Oups! Aucun étudiant trouvé.</td>
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
 
