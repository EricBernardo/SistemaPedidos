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
                    <h3 class="box-title">{{ trans('adminlte_lang::message.edit') }}</h3>
                </div>
                <div class="box-body">

                    <form method="POST" action="{{ route('product.update', [ 'id' => $result['id'] ]) }}">

                        @method('PUT')

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.title') }}:</label>
                                <input type="text" name="title" value="{{$result['title']}}" class="form-control" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ trans('adminlte_lang::message.price') }}:</label>
                                <input type="text" name="price" value="{{number_format($result['price'],2,',','.')}}" class="form-control" required>
                            </div>

                            <div class="form-group col-md-12">
                                <a href="{{ route('product.index') }}" class="btn btn-default pull-left">
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
