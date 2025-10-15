<div class="p-4 border rounded shadow">
    <div>
        <div class="card-body">
            <div class="table-responsive">
                <h3>
                    Assigner des Permissions a: {{$name}} --{{$role}}
                    <span>
                        <button wire:click="save" style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                            Valider
                        </button>
                    </span>
                </h3>
                <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                    <thead>
                        <tr style="background-color: rgb(7, 7, 99)" class="text-white">
                            <th>Cocher</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissionsGrouped as $permissions)
                            <tr>
                                <td><input 
                                    wire:click="togglePermission({{ $permissions->id }})"
                                    wire:key="permissions-{{ $permissions->id }}"
                                    @checked(in_array($permissions->id, $selectedPermissions)) 
                                    type="checkbox"
                                    >
                                </td>
                                <td>{{ $permissions->name }}</td>
                                @empty
                            <tr>
                                <td colspan="5" class="px-6 py-2.5 text-danger whitespace-nowrap text">
                                    Oups! Aucune permission trouvée.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>  
                <div class="mt-4">
                        {{$permissionsGrouped->links()}}
                </div>
    </div>

</div>
