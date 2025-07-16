<div class="card shadow mb-4">
        <div class="justify-content-between card-header py-3 d-flex">
                <div>
                    <h3>MODIFIER LE FRAIS : {{$feesId}}</h3>
                </div> 
                <div>
                    <a href="#" style="background-color: rgb(7, 7, 99)" class="btn text-white">Liste la liste</a>
                </div>
        </div>
        {{-- table --}}
        <div class="justify-content-between card-header">
            <form wire:submit="edit">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nom du frais</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="name"
                            >
                             @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                            <label for="">Description</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="description"
                            >

                            <label for="">Montant</label>
                            <input 
                                class="form-control"
                                type="text"
                                placeholder=""
                                wire:model="amount"
                            >
                        </div>
                    </div>
                    <div>
                        <button style="background-color: rgb(7, 7, 99)" class="btn text-white py-2 my-3">
                            Valider
                        </button>
                    </div>
                </div>
            </form>
            @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
        </div>  
</div> 
