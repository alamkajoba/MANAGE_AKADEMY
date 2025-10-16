<div>
<div class="row mb-4">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Entrée Caisse Total
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $this->totalFees }} USD
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Dépenses
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $this->totalDepenses }} USD
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Solde Caisse
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $this->solde }} USD
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <!-- Colonne Entrées -->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-success">Entrées (Frais encaissés)</h6>
            </div>
            <div class="card-body">
                <br>
                
                <table class="table table-bordered table-striped">
                    <thead style="background-color: rgb(7, 7, 99)" class="text-white">
                        <tr>
                           
                            <th>Motif</th>
                            <th>Montant</th>
                            <th>Date entrée</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($entrees as $paiement)
                            <tr>
                               
                                <td>{{ $paiement->fees?->name ?? '-' }}</td>
                                <td>{{ number_format($paiement->fees?->amount ?? 0, 2, ',', ' ') }} USD</td>
                                <td>{{ \Carbon\Carbon::parse($paiement->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">Aucune entrée enregistrée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                 <div class="mt-4">
            {{ $entrees->links() }}
        </div>
            </div>
             
        </div>
    </div>
   

    <!-- Colonne Sorties -->
    <div class="col-md-6">
        
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-danger">Sorties (Dépenses)</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                        <label>Date début :</label>
                        <input type="date" wire:model.live="dateDebut" class="form-control d-inline w-auto mx-2">
                        <label>Date fin :</label>
                        <input type="date" wire:model.live="dateFin" class="form-control d-inline w-auto mx-2">
                </div>
                <table class="table table-bordered table-striped">
                    <thead style="background-color: rgb(7, 7, 99)" class="text-white">
                        <tr>
                            <th>Motif dépense</th>
                            <th>Montant</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($depenses as $depense)
                            <tr>
                                <td>{{ $depense->description }}</td>
                                <td>{{ number_format($depense->amount, 2, ',', ' ') }} USD</td>
                                <td>{{ \Carbon\Carbon::parse($depense->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-danger">Aucune dépense enregistrée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                 <div class="mt-4">
            {{ $depenses->links() }}
        </div>
            </div>
            
           
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
</script>















