  <div class="container">
        <div class="row">   
                          
            <div  id="print-section" class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100px" cellspacing="0">
                {{-- searchfilter --}}
               
                  
                <thead >
                    
                    <tr><td colspan="4"></td></tr>
                    <tr style="background-color: rgb(7, 7, 99)" class="text-white">
                        <th>Nom</th>
                        <th>Postnom</th>
                        <th>Prénom</th>
                        <th>Classe</th>
                        <th>Option</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <td>{{$payment->enrollment->student?->first_name ?? '-'}}</td>
                            <td>{{$payment->enrollment->student?->middle_name ?? '-'}}</td>
                             <td>{{$payment->enrollment->student?->last_name ?? '-'}}<yy/td>
                             <td>{{$payment->enrollment->level?->class_name ?? '-' }} eme</td>
                            <td>{{$payment->enrollment->option?->faculty_name ?? '-' }}</td>
                            <!-- <td>{{ $payment->fees?->name ?? '-' }}</td> -->
                           <td>
                                <button class="btn text-white fa fa-print"
                                    style="background-color: rgb(7, 7, 99)"
                                    onclick="printDiv('receipt-{{ $payment->id }}')">
                                    Imprimer
                                </button>
                            </td>
                        </tr>

                        {{-- Reçu imprimable caché --}}
                        <tr style="display:none;">
                                <td colspan="100%">
                                    <div id="receipt-{{ $payment->id }}" class="p-4" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: white; color: black; border: 1px solid #ccc; max-width: 700px; margin: auto;">
                                        <div style="text-align: center; margin-bottom: 20px;">
                                            <h3 style="margin: 0;">COMPLEXE SCOLAIRE ALVINE</h3>
                                            <small style="font-size: 12px;">Adresse : 12 AVENUE DE L'EGLISE, LUBUMBASHI • Tél : +243 </small>
                                        </div>

                                        <hr style="margin: 20px 0;">

                                        <h4 style="text-align: center; text-decoration: underline;">Reçu de Paiement</h4>
                                        <p style="text-align: center;"><strong>Mois :</strong> {{ $payment->fees->name ?? '-' }}</p>

                                        <table style="width: 100%; margin-bottom: 15px; font-size: 14px;">
                                            <tr>
                                                <td><strong>Nom :</strong></td>
                                                <td>{{ $payment->enrollment->student?->first_name }} {{ $payment->enrollment->student?->middle_name }} {{ $payment->enrollment->student?->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Classe :</strong></td>
                                                <td>{{ $payment->enrollment->level?->class_name }}<sup>ème</sup> {{ $payment->enrollment->option?->faculty_name }}</td>
                                            </tr>
                                           
                                            <tr>
                                                <td><strong>Frais :</strong></td>
                                                <td>{{ $payment->fees->name ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Montant payé :</strong></td>
                                                <td>{{ number_format($payment->fees->amount, 0, ',', ' ') }} FC</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date de paiement :</strong></td>
                                                <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}</td>
                                            </tr>
                                        </table>

                                        <table class="table table-bordered" style="width: 100%; font-size: 14px; margin-top: 20px;">
                                            <thead style="background: #f0f0f0;">
                                                <tr>
                                                    <th style="text-align: left;">Motif de paiement</th>
                                                    <th style="text-align: right;">Montant</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Minerval {{ $payment->fees->name ?? '-' }}</td>
                                                    <td style="text-align: right;">{{ number_format($payment->fees->amount) }} FC</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td style="text-align: right;"><strong>Total</strong></td>
                                                    <td style="text-align: right;"><strong>{{ number_format($payment->fees->amount) }} FC</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div style="margin-top: 30px;">
                                            <p><strong>Signature:</strong> __________________________</p>
                                            <p style="text-align: center; font-size: 12px; margin-top: 30px;">Merci d’avoir réglé vos frais scolaires.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-danger text-center">Aucun élève trouvé.</td>
                        </tr>
                   
                        <tr>
                            <td colspan="5" class="px-6 py-2.5 text-danger whitespace-nowrap text">
                                Oups! Aucun Eleve trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>  
       
            <div class="mt-4">
                
            </div>
    </div>  
    <script>
    function printDiv(divId) {
        let content = document.getElementById(divId).innerHTML;
        let original = document.body.innerHTML;

        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = original;
        location.reload(); // Recharge la page après impression
    }
</script>