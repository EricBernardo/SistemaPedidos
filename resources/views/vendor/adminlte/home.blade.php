@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-md-trending-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Entradas (+)</span>
                <span class="info-box-number">R$500.00</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-md-trending-down"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Saidas (-)</span>
                <span class="info-box-number">R$ 200.00</span>
            </div>
        </div>
    </div>

    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-md-cash"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Saldo (=)</span>
                <span class="info-box-number">R$ 300.00</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Clientes</span>
                <span class="info-box-number">2,000</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-md-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pedidos</span>
                <span class="info-box-number">2,000</span>
            </div>
        </div>
    </div>
</div>

@endsection
