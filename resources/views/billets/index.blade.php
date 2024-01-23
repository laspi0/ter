@extends('billets.menu')

@section('content')


<div class="container">
    <h2>Mes Réservations</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if($billets->isEmpty())
    <p>Vous n'avez aucune réservation.</p>
    @else
    <!-- ... (votre code existant) ... -->

    <table class="table">
        <thead>
            <tr>
                <th>Classe</th>
                <th>Tarif</th>
                <th>Départ</th>
                <th>Arrivée</th>
                <th>Heure de Départ</th>
                <th>Action</th>
                <th>Voir</th> <!-- Nouvelle colonne -->
            </tr>
        </thead>
        <tbody>
            @foreach($billets as $billet)
            <tr>
                <td>{{ $billet->classe }}</td>
                <td>{{ $billet->tarif }}</td>
                <td>{{ $billet->depart }}</td>
                <td>{{ $billet->arrive }}</td>
                <td>{{ $billet->heure_depart }}</td>
                <td>
                    <a href="{{ route('billets.show', $billet->id) }}" class="btn btn-info">Voir le qr</a>
                </td>
                <td>
                    <form action="{{ route('billets.cancel', $billet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Annuler</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ... (votre code existant) ... -->

    @endif
</div>




@endsection