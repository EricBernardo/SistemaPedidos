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

                    <form method="POST" action="{{ url('order/store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="form-group col-xs-12 col-md-4">
                                <label>{{ trans('adminlte_lang::message.client') }}:</label>
                                <select class="form-control" name="client_id">
                                    <option value="">Selecione</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client['id']}}" {{old('client_id') == $client['id'] ? 'selected' : '' }}>{{$client['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-md-4">
                                <label>{{ trans('adminlte_lang::message.situation') }}:</label>
                                <select class="form-control" name="paid">
                                    <option value="0" {{old('paid') == '0' ? 'selected' : '' }}>{{ trans('adminlte_lang::message.no_paid') }}</option>
                                    <option value="1" {{old('paid') == '0' ? 'selected' : '' }}>{{ trans('adminlte_lang::message.paid') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-md-4">
                                <label>{{ trans('adminlte_lang::message.discount') }}:</label>
                                <input type="text" name="discount" class="form-control" value="{{ old('discount') }}">
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">{{ trans('adminlte_lang::message.products') }}</h3>
                                        <button class="btn btn-success pull-right">{{ trans('adminlte_lang::message.add_product') }}</button>
                                    </div>
                                    <div class="box-body no-padding">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>{{ trans('adminlte_lang::message.product') }}</th>
                                                <th style="width: 40px">{{ trans('adminlte_lang::message.quantity') }}</th>
                                                <th>{{ trans('adminlte_lang::message.price') }}</th>
                                                <th>-</th>
                                            </tr>
                                            <tr>
                                                <td>1.</td>
                                                <td>
                                                    <select class="form-control" name="product_id[]">
                                                        @foreach($products as $product)
                                                            <option data-price="{{$product['price']}}"
                                                                    value="{{$product['id']}}">{{$product['title']}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="price">
                                                    R$ {{number_format($products[0]['price'],2,',','.')}}</td>
                                                <td><input type="number" name="quantity[]" min="1" value="1"
                                                           class="form-control"></td>
                                                <td>
                                                    <button type="submit" class="btn btn-danger btn-sm btn-delete"
                                                            title="{{ trans('adminlte_lang::message.remove') }}"
                                                            data-destroy>
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                        {{ trans('adminlte_lang::message.remove') }}
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Subtotal</h3>
                                    </div>
                                    <div class="box-body no-padding">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
