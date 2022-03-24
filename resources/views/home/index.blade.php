@extends('layouts.app')

@section('content')
<div class="main">
    <!-- sera mise à jour au click sur une province -->
    <aside class="stats">
        <div class="stats-cumul-case">
            <h1 class="stats-cumul-case-province">stat générale du pays</h1>
            <div class="stats-cumul-case-numbers">10000</div>
            <div class="stats-cumul-case-title">cas cumulé</div>
        </div>
        <div class="stats-item">
            <div class="stats-item-value">
                200
            </div>
            <div class="stats-item-title">
                Nouveaux cas confirmé
            </div>
        </div>
        <div class="stats-item" id="new_death">
            <div class="stats-item-value">
                200
            </div>
            <div class="stats-item-title">
                Nouveaux cas de décés
            </div>
        </div>
        <div class="stats-item" id="cumul_death">
            <div class="stats-item-value">
                200
            </div>
            <div class="stats-item-title">
                décés cumulés
            </div>
        </div>
    </aside>
    <div class="drawable-area">
        <div class="map"></div>
        <div class="charts"></div>
    </div>
    <aside class="provinces-list">
        <div class="provinces-list-item">
            <h1 class="provinces-list-item-title">province nom</h1>
            <div class="provinces-list-item-content">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga temporibus voluptate error voluptates accusamus exercitationem unde architecto cumque provident accusantium ipsa id quidem similique possimus nulla in magnam dolor corporis perspiciatis, at
                    cupiditate ea.
                </p>
            </div>
        </div>
    </aside>
</div>
@endsection