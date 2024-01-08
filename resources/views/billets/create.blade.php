@extends('billets.app')

@section('content')

<div class="loader-wrapper">
    <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div class="card card-authentication1 mx-auto my-5">
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="../assets/images/logo-icon.png" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Réservation</div>
            <form method="POST" action="{{ route('billets.store') }}">
                @csrf
                <div class="form-group">
                    <div class="position-relative has-icon-right">
                        <select name="depart" id="depart" class="form-control input-shadow" required>
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
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <div class="form-group">
                                <select name="arrive" id="arrive" class="form-control" required>
                                    <option value="">Sélectionner le lieu d'arrivée</option>
                                </select>
                            </div>
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="classe" id="classe" class="form-control" required>
                            <option value="">Sélectionner la classe</option>
                            <option value="1ère classe">1ère classe</option>
                            <option value="2ème classe">2ème classe</option>
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
                    <button type="submit" class="btn btn-light btn-block">Réserver</button>
            </form>
        </div>
    </div>

</div>

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->

<!--start color switcher-->
<div class="right-sidebar">
    <div class="switcher-icon">
        <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

        <p class="mb-0">Texture Gaussienne</p>
        <hr>

        <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
        </ul>

        <p class="mb-0">Arrière-plan dégradé</p>
        <hr>

        <ul class="switcher">
            <li id="theme7"></li>
            <li id="theme8"></li>
            <li id="theme9"></li>
            <li id="theme10"></li>
            <li id="theme11"></li>
            <li id="theme12"></li>
            <li id="theme13"></li>
            <li id="theme14"></li>
            <li id="theme15"></li>
        </ul>

    </div>
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
            if (classe === '1ère classe') {
                tarif = 2500;
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
<!--end color switcher-->

@endsection