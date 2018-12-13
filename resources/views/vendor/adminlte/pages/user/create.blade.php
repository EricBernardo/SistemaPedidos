@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

    <section class="content">

        <div class="row">

            @include('adminlte::components.errors')
            @include('adminlte::components.message')

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.register') }}</h3>
                </div>
                <div class="box-body">

                    <form method="POST" action="{{ route('user.store') }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">

                            <div class="form-group col-xs-12">
                                <label>{{ trans('adminlte_lang::message.name') }}:</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group col-xs-12">
                                <label>{{ trans('adminlte_lang::message.email') }}:</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group col-xs-12">
                                <label>{{ trans('adminlte_lang::message.password') }}:</label>
                                <input type="password" name="password" class="form-control" value="" required>
                            </div>

                            <div class="form-group col-xs-12">
                                <label>{{ trans('adminlte_lang::message.password_confirmation') }}:</label>
                                <input type="password" name="password_confirmation" class="form-control" value="">
                            </div>

                            <div class="form-group col-xs-12">
                                <a href="{{ route('user.index') }}" class="btn btn-default pull-left">
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
