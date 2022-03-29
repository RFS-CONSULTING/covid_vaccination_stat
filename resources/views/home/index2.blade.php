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
<div class="main">
    <!-- sera mise à jour au click sur une province -->
    <aside class="stats">
        <div class="stats-cumul-case">
            <h1 class="stats-cumul-case-province">République Démocratique du Congo</h1>
            <div class="stats-cumul-case-numbers">{{ $population }}</div>
            <div class="stats-cumul-case-title">Population</div>
        </div>
        <div class="stats-item">
            <div class="stats-item-value">
                200
            </div>
            <div class="stats-item-title">
                Vaccins disponibles
            </div>
        </div>
        <div class="stats-item" id="new_death">
            <div class="stats-item-value">
                200
            </div>
            <div class="stats-item-title">
                Total vaccinées
            </div>
        </div>
        <div class="stats-item" id="cumul_death">
            <div class="stats-item-value">
                200
            </div>
            <div class="stats-item-title">
                Sites disponibles
            </div>
        </div>
    </aside>
    <div class="drawable-area">
        <div class="map" id="map"></div>
        <div class="charts">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <aside class="provinces-list">
        @foreach ($provinces as $province)
            <div class="provinces-list-item">
                <h1 class="provinces-list-item-title">{{ $province->nom }}</h1>
                <div class="provinces-list-item-content">
                    <ul>
                        <li>Chef lieu: {{$province->chef_lieu}}</li>
                        <li>Population total: {{$province->pop_totale}}</li>
                        <li>Personne vaccinée: {{$province->pers_vacci}}</li>
                        <li>Nombres des sites: {{$province->nbre_sites}}</li>
                    </ul>
                </div>
            </div>
        @endforeach
        
    </aside>
</div>
@endsection