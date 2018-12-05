@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

    <section class="content">

        <div class="row">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Cadastro</h3>
                </div>
                <div class="box-body">

                    <form method="POST" action="{{ url('client/store') }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label>{{ trans('adminlte_lang::message.cnpj') }}:</label>
                                <input type="text" name="cnpj" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label>{{ trans('adminlte_lang::message.title') }}:</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.phone') }}:</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                            <div class="form-group col-xs-4 col-md-2">
                                <label>{{ trans('adminlte_lang::message.state') }}:</label>
                                <input type="text" name="state" class="form-control" minlength="2" maxlength="2">
                            </div>

                            <div class="form-group col-xs-8 col-md-4">
                                <label>{{ trans('adminlte_lang::message.city') }}:</label>
                                <input type="text" name="city" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.address') }}:</label>
                                <input type="text" name="address" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.neighborhood') }}:</label>
                                <input type="text" name="neighborhood" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.number') }}:</label>
                                <input type="number" name="number" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.complement') }}:</label>
                                <input type="text" name="complement" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-info" value="Salvar"/>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection
