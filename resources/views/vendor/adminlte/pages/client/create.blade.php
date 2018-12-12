@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

    <section class="content">

        <div class="row">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.register') }}</h3>
                </div>
                <div class="box-body">

                    @include('adminlte::components.errors')
                    @include('adminlte::components.message')

                    <form method="POST" action="{{ route('client.store') }}" data-action="{{ route('order.create') }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.cnpj') }}:</label>
                                <input type="text" name="cnpj" class="form-control" value="{{ old('cnpj') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.title') }}:</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.state_registration') }}:</label>
                                <input type="text" name="state_registration" class="form-control"
                                       value="{{ old('state_registration') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.phone') }}:</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.cep') }}:</label>
                                <input type="text" name="cep" class="form-control" value="{{ old('cep') }}">
                            </div>

                            <div class="form-group col-xs-4 col-md-2">
                                <label>{{ trans('adminlte_lang::message.state') }}:</label>
                                <select class="form-control" name="state_id" data-value="{{old('state_id')}}">
                                    <option value="">Selecione</option>
                                    @foreach($states as $state)
                                        <option value="{{$state['id']}}">{{$state['abbr']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-xs-8 col-md-4">
                                <label>{{ trans('adminlte_lang::message.city') }}:</label>
                                <select class="form-control" name="city_id" data-value="{{old('city_id')}}" data-text="">
                                    <option value="">Selecione</option>
                                    <option value="">Selecione um estado</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.address') }}:</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.neighborhood') }}:</label>
                                <input type="text" name="neighborhood" class="form-control"
                                       value="{{ old('neighborhood') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.number') }}:</label>
                                <input type="number" name="number" class="form-control" value="{{ old('number') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.complement') }}:</label>
                                <input type="text" name="complement" class="form-control"
                                       value="{{ old('complement') }}">
                            </div>

                            <div class="form-group col-md-12">
                                <a href="{{ route('client.index') }}" class="btn btn-default pull-left">
                                    {{ trans('adminlte_lang::message.back') }}
                                </a>
                                <input type="submit" class="btn btn-info pull-right"
                                       value="{{ trans('adminlte_lang::message.save') }}"/>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection
