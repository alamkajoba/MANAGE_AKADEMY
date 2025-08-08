<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                {{-- searchfilter --}}
               <div class="container">          
                    
                <thead>
                    <tr><td colspan="4">Liste des etudiants en ordre avec le mois de  {{$selectedMonth}} </td></tr>
                    <tr style="background-color: rgb(7, 7, 99)" class="text-white">
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Prénom</th>
                        <th>Classe</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $enrollment)
                        <tr>
                            <td>{{$enrollment->student?->first_name ?? '-'}}</td>
                            <td>{{$enrollment->student?->middle_name ?? '-'}}</td>
                             <td>{{$enrollment->student?->last_name ?? '-'}}</td>
                             <td>{{$enrollment->level?->class_name ?? '-' }} eme</td>
                            <td>{{$enrollment->option?->faculty_name ?? '-' }}</td>
                      
              
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-2.5 text-danger whitespace-nowrap text">
                                Oups! Aucun Eleve trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>  
