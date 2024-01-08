<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails du Billet</title>
</head>

<body>

    <div class="container">
        <h2>Détails du Billet</h2>

        @if(isset($billet))

        <div>
            {!! $qrCode !!}
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Détails du billet</h5>
                <p class="card-text">Classe: {{ $billet->classe }}</p>
                <p class="card-text">Tarif: {{ $billet->tarif }} FCFA</p>
                <p class="card-text">Départ: {{ $billet->depart }}</p>
                <p class="card-text">Arrivée: {{ $billet->arrive }}</p>
                <p class="card-text">Date de Départ: {{ date('d/m/Y', strtotime($billet->heure_depart)) }}</p>
                <p class="card-text">Heure de Départ: {{ date('H:i', strtotime($billet->heure_depart)) }}</p>
            </div>
        </div>
        @else
        <p>Billet non trouvé.</p>
        @endif
    </div>

</body>

</html>