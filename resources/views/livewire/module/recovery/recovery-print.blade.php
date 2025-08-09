<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>FILTRE DE RECOUVREMENT</h3>
                </div> 
                <div>
                    <button onclick="window.print()" style="background-color: rgb(7, 7, 99)" class="btn text-white fa fa-print">Imprimer</button>
                </div>
                <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #print-section,
            #print-section * {
                visibility: visible;
            }

            #print-section {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
     @push('scripts')
        <script>
            window.addEventListener('trigger-print', function () {
                window.print();
            });
        </script>
    @endpush
                
    
        </div>

        
        {{-- table --}}
        <div class="card-body">
        <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="middlename">Mois</label>
                           <select 
                                required
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model.live="selectedMonth">
                                <option>Selectionner le mois</option>
                                @foreach ($feeses as $fees)
                                    <option value="{{ $fees->id }}">{{$fees->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-4">
                         <label for="">Classe</label>
                            <select 
                                required
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model.live="selectedClass">
                                <option>Selectionner une classe</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{$level->class_name}} ème</option>
                                @endforeach
                            </select>
                        </div>     
                         <div class="col-md-4">
                           <label for="">Option</label>
                            <select 
                                required
                                    class="form-control"
                                    type="text"
                                    placeholder=""
                                    wire:model.live="selectedOption">
                                <option>Selectionner une option</option>
                                @foreach ($options as $option)
                                    <option value="{{ $option->id }}">{{$option->faculty_name}}</option>
                                @endforeach
                            </select> </div>
                              <div class="card-body">
                 <div class="container">
                    <div class="row">   
                          
        <div  id="print-section" class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                {{-- searchfilter --}}
               
                  
                <thead >
                    Liste des etudiants en ordre avec le mois de  {{$selectedMonth}} 
                    <tr><td colspan="4"></td></tr>
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
        {{-- paginate --}}
            <div class="mt-4">
                {{-- {{$products->links()}} --}}
            </div>
    </div>  
    
</div> 