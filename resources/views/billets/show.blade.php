    @extends('billets.menu')

    @section('content')

    <div class="container">
        <h2 class="text-center mb-4">Détails du Billet</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(isset($billet))
                    <div class="card border-primary mb-3" style="max-width: 30rem; margin: 0 auto;">
                        <div class="card-header bg-primary text-white text-center">Code QR et Détails du billet</div>
                        <div class="card-body row">
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <div>{!! $qrCode !!}</div>
                            </div>
                            <div class="col-md-6 ">
                                <h5 class="card-title">Détails du billet</h5>
                                <p class="card-text">Classe: {{ $billet->classe }}</p>
                                <p class="card-text">Tarif: {{ $billet->tarif }} FCFA</p>
                                <p class="card-text">Départ: {{ $billet->depart }}</p>
                                <p class="card-text">Arrivée: {{ $billet->arrive }}</p>
                                <p class="card-text">Date de Départ: {{ date('d/m/Y', strtotime($billet->heure_depart)) }}</p>
                                <p class="card-text">Heure de Départ: {{ date('H:i', strtotime($billet->heure_depart)) }}</p>
                            </div>
                        </div>
                        <form action="{{ route('billets.cancel', $billet->id) }}" method="POST" class="d-flex justify-content-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Annuler</button>
                        </form>
                    </div>
                @else
                    <p class="text-center">Billet non trouvé.</p>
                @endif
            </div>
        </div>
    </div>

    @endsection
