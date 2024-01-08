<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Réservation de Billet</title>
</head>

<body>

    <div class="container">
        <h2>Réservation de Billet</h2>
        <form action="{{ route('billets.store') }}" method="post" id="billetForm">
            @csrf

            <div class="form-group">
                <label for="depart">Départ</label>
                <select name="depart" id="depart" class="form-control" required>
                    <option value="">Sélectionner le lieu de départ</option>
                    <option value="Dakar">Dakar</option>
                    <option value="Colobane">Colobane</option>
                    <option value="Hann">Hann</option>
                    <option value="Dalifort">Dalifort</option>
                    <option value="Baux-Maraichers">Baux-Maraichers</option>
                    <option value="Thiaroye">Thiaroye</option>
                    <option value="Yembeul">Yembeul</option>
                    <option value="Keur Mbaye Fall">Keur Mbaye Fall</option>
                    <option value="PNR">PNR</option>
                    <option value="Rufisque">Rufisque</option>
                    <option value="Bargny">Bargny</option>
                    <option value="Diamniado">Diamniado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="arrive">Arrivée</label>
                <select name="arrive" id="arrive" class="form-control" required>
                    <option value="">Sélectionner le lieu d'arrivée</option>
                </select>
            </div>

            <div class="form-group">
                <label for="classe">Classe</label>
                <select name="classe" id="classe" class="form-control" required>
                    <option value="">Sélectionner la classe</option>
                    <option value="1ère classe">1ère classe</option>
                    <option value="2ème classe">2ème classe</option>
                    <!-- Ajoutez d'autres options selon vos besoins -->
                </select>
            </div>

            <div class="form-group">
                <label for="tarif">Tarif</label>
                <div class="input-group">
                    <input type="number" name="tarif" id="tarif" class="form-control" readonly>
                    <div class="input-group-append">
                        <span class="input-group-text">FCFA</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="heure_depart">Heure de Départ</label>
                <input type="datetime-local" name="heure_depart" id="heure_depart" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Réserver</button>
        </form>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('heure_depart');

            input.addEventListener('change', function() {
                var selectedDate = new Date(this.value);
                var currentDate = new Date();

                if (selectedDate < currentDate) {
                    alert('Veuillez sélectionner une date ou une heure future.');
                    this.value = '';
                }
            });

            $('#depart').change(function() {
                var depart = $(this).val();
                var arriveSelect = $('#arrive');
                arriveSelect.empty(); // Vide les options actuelles

                if (depart !== '') {
                    // Remplit les options pour le lieu d'arrivée en excluant le lieu de départ
                    var destinations = ['Dakar', 'Colobane', 'Hann', 'Dalifort', 'Baux-Maraichers', 'Thiaroye', 'Yembeul', 'Keur Mbaye Fall', 'PNR', 'Rufisque', 'Bargny', 'Diamniado'];
                    for (var i = 0; i < destinations.length; i++) {
                        if (depart !== destinations[i]) {
                            arriveSelect.append($('<option></option>').attr('value', destinations[i]).text(destinations[i]));
                        }
                    }
                } else {
                    arriveSelect.append($('<option></option>').attr('value', '').text('Sélectionner le lieu d\'arrivée'));
                }
            });

            $('#depart, #arrive, #classe').change(function() {
                var depart = $('#depart').val();
                var arrive = $('#arrive').val();
                var classe = $('#classe').val();

                var tarif = 0;
                if (classe === '1') {
                    tarif = 1500;
                } else {
                    if (depart === 'Dakar' && arrive === 'Colobane') {
                        tarif = 500;
                    } else if (depart === 'Dakar' && arrive === 'Hann') {
                        tarif = 1000;
                    } else if (depart === 'Dakar' && arrive === 'Dalifort') {
                        tarif = 2000;
                    } else if (depart === 'Dakar' && arrive === 'Pikine') {
                        tarif = 2500;
                    }
                }
                $('#tarif').val(tarif);
            });

        });
    </script>

</body>

</html>