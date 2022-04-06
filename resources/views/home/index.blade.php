@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
@endsection

@section('content')
<div class="row mt-4 mb-6">
    <div class="col-md-12">
        <h1>Statistiques sur la vaccination contre la COVID-19 en RDC</h1>
        <span>mise à jour le 10/01/2022</span>
    </div>
</div>
<div class="row">
    <div class="col-md-6 stats">
        <div class="row stats-items">
            <div class="col-md-12 mb-2 stats-items-item-row">
                <div class="column">
                    <div class="column-img">
                        <img src="img/icon-calendrier.png" alt="">
                    </div>
                    <div class="column-numbers" id="jours_vacci">
                        {{ \Carbon\Carbon::parse($pays->date_debut)->diffInDays() }} jours
                    </div>
                    <div class="column-label">
                        Depuis le début de la vaccination
                    </div>
                </div>
                <div class="column">
                    <div class="column-img">
                        <img src="img/icon-seringue.png" alt="">
                    </div>
                    <div class="column-numbers" id="doses">
                        10.000
                    </div>
                    <div class="column-label">
                        Doses administrées
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-2 stats-items-item-row">
                <div class="column">
                    <div class="column-img">
                        <img src="img/icon-couverture.png" alt="">
                    </div>
                    <div class="column-numbers" id="couverture_vaccinale">
                        65%
                    </div>
                    <div class="column-label">
                        Couverture vaccinale
                    </div>
                </div>
                <div class="column">
                    <div class="column-img">
                        <img src="img/icon-medical.png" alt="">
                    </div>
                    <div class="column-numbers" id="pers_vacci">
                        100000
                    </div>
                    <div class="column-label">
                        Personnes vaccinées
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-2 stats-items-item-row">
                <div class="column">
                    <div class="column-img">
                        <img src="img/icon-hopital.png" alt="">
                    </div>
                    <div class="column-numbers" id="nbr_sites">
                        {{$pays->nbre_sites}}
                    </div>
                    <div class="column-label">
                        Sites disponible
                    </div>
                </div>
                <div class="column">
                    <div class="column-img">
                        <img src="img/icon-camion.png" alt="">
                    </div>
                    <div class="column-numbers" id="doses_livres">
                        1000000
                    </div>
                    <div class="column-label">
                        Doses livrés
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map" class="col-md-5">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2>Sites de vaccination</h2>
        <table class="table table-primary" id="site_vacc">
            <thead>
                <tr>
                  <th scope="col">Nom du site</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">Horaire de travail</th>
                  <th scope="col">Contact</th>
                </tr>
              </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <h2>Situations des Villes pour la province : <span></span></h2>
        <table class="table table-primary" id="tab_villes">
            <thead>
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Population</th>
                </tr>
              </thead>
            <tbody>
                <tr>
                    <td>helle</td>
                    <td>helle</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection