@extends('adminlte::layouts.app')
@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <section
            class="content">
        <div class="row">

            <div class="alert alert-danger alert-dismissible hide">
                <h4><i aria-hidden="true" class="icon fa fa-ban"></i>
                    Errors
                </h4>
                <ul></ul>
            </div>

            <div class="alert alert-success alert-dismissible hide"></div>

            <div class="box box-info">

                <div class="box-header">
                    <h3 class="box-title">
                        {{ trans('adminlte_lang::message.order') }}
                    </h3>
                    <button class="btn btn-success pull-right btn-product-add">{{ trans('adminlte_lang::message.add_product') }}</button>
                </div>

                <div class="box-body">

                    <form method="POST" action="javascript:save_order()" data-action="{{ route('order.update', [ 'id' => $result['id'] ]) }}" id="form-order-create">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @method('PUT')

                        <div class="card">

                            <div class="row">

                                <div class="form-group col-xs-12 col-md-3">

                                    <label><strong>{{ trans('adminlte_lang::message.client') }}:</strong></label>

                                    <select class="form-control" name="client_id" required>
                                        <option value="">{{ trans('adminlte_lang::message.select_client') }}</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client['id']}}" {{$result['client_id'] == $client['id'] ? 'selected' : ''}}>{{$client['title']}}</option>
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
                                @foreach($result['products'] as $product)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">

                                                    <select class="form-control" name="product_id[]" readonly>
                                                        <option data-price="{{$product['pivot']['price']}}" value="{{$product['id']}}">{{$product['title']}}</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <select class="form-control" name="quantity[]" readonly>
                                                <option>{{$product['pivot']['quantity']}}</option>
                                            </select>

                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price product-price">R$ {{number_format(($product['pivot']['price'] * $product['pivot']['quantity']),2,',','.')}}</var>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-danger btn-round btn-remove btn-sm"><i class="fa fa-remove"></i> Remover</a>
                                        </td>
                                    </tr>
                                @endforeach
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
                                                        <input type="text" class="form-control" name="discount" placeholder="R$ 0,00"
                                                               value="{{number_format($result['discount'],2,',','.')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label><strong>{{ trans('adminlte_lang::message.paid') }}?</strong></label>
                                                        <select class="form-control" name="paid">
                                                            <option value="0" {{!$result['paid'] ? 'selected' : ''}}>{{ trans('adminlte_lang::message.no_paid') }}</option>
                                                            <option value="1" {{$result['paid'] ? 'selected' : ''}}>{{ trans('adminlte_lang::message.paid') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-md-3 text-right">

                                            <p><h4 class="text-bold">{{ trans('adminlte_lang::message.overview_order') }}</h4></p>

                                            <p>
                                                <strong>{{ trans('adminlte_lang::message.subtotal') }}</strong>
                                                <strong class="text-lowercase">(<span class="order-total-product">1</span> {{ trans('adminlte_lang::message.product') }}(s)):</strong>
                                                <span class="order-subtotal">R$ {{number_format($result['subtotal'],2,',','.')}}</span>
                                            </p>
                                            <p>
                                                <strong>{{ trans('adminlte_lang::message.discount') }}: </strong>
                                                <span class="order-discount">R$ {{number_format($result['discount'],2,',','.')}}</span>
                                            </p>
                                            <p>
                                                <strong>{{ trans('adminlte_lang::message.total') }}: </strong>
                                                <span class="order-total">R$ {{number_format($result['total'],2,',','.')}}</span>
                                            </p>

                                            <p>
                                                <strong>{{ trans('adminlte_lang::message.date') }}: </strong>
                                                <span>{{date('d/m/Y H:i', strtotime($result['created_at']))}}</span>
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

                    </form>

                </div>

            </div>
        </div>
    </section>

@endsection
