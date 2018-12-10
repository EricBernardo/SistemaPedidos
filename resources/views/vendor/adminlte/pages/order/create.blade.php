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

                    <div class="card">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantidade</th>
                                <th scope="col" width="120">Preço</th>
                                <th scope="col" width="200" class="text-right">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="title text-truncate">Product name goes here </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <select class="form-control">
                                        @for($x = 1; $x <= 100; $x++)
                                            <option>{{$x}}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price">R$ 450</var>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="" class="btn btn-outline-danger btn-round">Remove</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="row">

                            <div class="col-xs-12">

                                <div class="row">

                                    <div class="col-xs-12 col-md-9">

                                        <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                                <div class="form-group">
                                                    <label><strong>Desconto</strong></label>
                                                    <input type="text" class="form-control" placeholder="R$ 0,00">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-md-3 text-right">

                                        <p><h4><strong>Resumo do pedido</strong></h4></p>

                                        <p><strong>Subtotal(4 produtos): </strong> R$ 450,00</p>
                                        <p><strong>Desconto: </strong> R$ 0,00</p>
                                        <p><strong>Total: </strong> R$ 650,00</p>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12">

                                <a href="{{ route('order.index') }}" class="btn btn-default pull-left">
                                    {{ trans('adminlte_lang::message.back') }}
                                </a>
                                <input type="submit" class="btn btn-info pull-right"
                                       value="{{ trans('adminlte_lang::message.save') }}"/>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
