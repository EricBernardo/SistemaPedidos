@extends('adminlte::layouts.app')
@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <section
            class="content">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        {{ trans('adminlte_lang::message.order') }}
                    </h3>
                    <button class="btn btn-success pull-right btn-product-add">{{ trans('adminlte_lang::message.add_product') }}</button>
                </div>
                <div class="box-body">
                    @include('adminlte::components.errors')
                    @include('adminlte::components.message')

                    <div class="card">

                        <div class="row">

                            <div class="form-group col-xs-12 col-md-3">

                                <label><strong>{{ trans('adminlte_lang::message.client') }}:</strong></label>

                                <select class="form-control" name="client_id[]">
                                    <option value="">{{ trans('adminlte_lang::message.select_client') }}</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client['id']}}">{{$client['title']}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">{{ trans('adminlte_lang::message.product') }}</th>
                                <th scope="col" width="120">{{ trans('adminlte_lang::message.quantity') }}</th>
                                <th scope="col" width="120">{{ trans('adminlte_lang::message.price') }}</th>
                                <th scope="col" width="120" class="text-right">{{ trans('adminlte_lang::message.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-body">
                                            <select class="form-control"
                                                    name="product_id[]">
                                                @foreach($products as $product)
                                                    <option data-price="{{$product['price']}}" value="{{$product['id']}}">
                                                        {{$product['title']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <select class="form-control" name="quantity[]">
                                        @for($x = 1; $x <= 100; $x++)
                                            <option>{{$x}}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        @foreach($products as $product)
                                            <var class="price product-price">R$ {{number_format($product['price'],2,',','.')}}</var>
                                            @break
                                        @endforeach

                                    </div>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-outline-danger btn-round btn-remove">{{ trans('adminlte_lang::message.remove') }}</a>
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
                                                    <label><strong>{{ trans('adminlte_lang::message.discount') }}</strong></label>
                                                    <input type="text" class="form-control" name="discount" placeholder="R$ 0,00">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-md-3 text-right">

                                        <p><h4 class="text-bold">{{ trans('adminlte_lang::message.overview_order') }}</h4></p>

                                        <p>
                                            <strong>{{ trans('adminlte_lang::message.subtotal') }}</strong>
                                            <strong class="text-lowercase">(<span class="order-total-product">1</span> {{ trans('adminlte_lang::message.product') }}(s)):</strong>
                                            @foreach($products as $product)
                                                <span class="order-subtotal">R$ {{number_format($product['price'],2,',','.')}}</span>
                                                @break
                                            @endforeach
                                        </p>
                                        <p>
                                            <strong>{{ trans('adminlte_lang::message.discount') }}: </strong>
                                            <span class="order-discount">R$ 0,00</span>
                                        </p>
                                        <p>
                                            <strong>{{ trans('adminlte_lang::message.total') }}: </strong>
                                            @foreach($products as $product)
                                                <span class="order-total">R$ {{number_format($product['price'],2,',','.')}}</span>
                                                @break
                                            @endforeach
                                        </p>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12">

                                <a href="{{ route('order.index') }}" class="btn btn-default pull-left">{{ trans('adminlte_lang::message.back') }}</a>
                                <input type="submit" class="btn btn-info pull-right" value="{{ trans('adminlte_lang::message.save') }}"/>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
