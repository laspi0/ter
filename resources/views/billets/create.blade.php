
    <div class="container">
        <h2>Réservation de Billet</h2>

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

        <form action="{{ route('billets.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="classe">Classe</label>
                <input type="text" name="classe" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tarif">Tarif</label>
                <input type="number" name="tarif" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="depart">Départ</label>
                <input type="text" name="depart" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="arrive">Arrivée</label>
                <input type="text" name="arrive" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="heure_depart">Heure de Départ</label>
                <input type="datetime-local" name="heure_depart" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Réserver</button>
        </form>
    </div>
