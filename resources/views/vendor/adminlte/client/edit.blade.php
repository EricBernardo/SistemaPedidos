@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

    <section class="content">

        <div class="row">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.edit') }}</h3>
                </div>
                <div class="box-body">

                    @include('adminlte::components.errors')
                    @include('adminlte::components.message')

                    <form method="POST" action="{{ url('client/update/'. $result['id']) }}">

                        @method('PUT')

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label>{{ trans('adminlte_lang::message.cnpj') }}:</label>
                                <input type="text" name="cnpj" value="{{$result['cnpj']}}" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label>{{ trans('adminlte_lang::message.title') }}:</label>
                                <input type="text" name="title" value="{{$result['title']}}" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.phone') }}:</label>
                                <input type="text" name="phone" value="{{$result['phone']}}" class="form-control">
                            </div>

                            <div class="form-group col-xs-4 col-md-2">
                                <label>{{ trans('adminlte_lang::message.state') }}:</label>
                                <input type="text" name="state" value="{{$result['state']}}" class="form-control"
                                       minlength="2" maxlength="2">
                            </div>

                            <div class="form-group col-xs-8 col-md-4">
                                <label>{{ trans('adminlte_lang::message.city') }}:</label>
                                <input type="text" name="city" value="{{$result['city']}}" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.address') }}:</label>
                                <input type="text" name="address" value="{{$result['address']}}" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.neighborhood') }}:</label>
                                <input type="text" name="neighborhood" value="{{$result['neighborhood']}}"
                                       class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.number') }}:</label>
                                <input type="number" name="number" value="{{$result['number']}}" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.complement') }}:</label>
                                <input type="text" name="complement" value="{{$result['complement']}}"
                                       class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-info pull-right" value="{{ trans('adminlte_lang::message.save') }}"/>
                                <input type="submit" class="btn btn-info pull-left" value="{{ trans('adminlte_lang::message.save') }}"/>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection
