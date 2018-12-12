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
                </div>

                <div class="box-body">

                    <div class="alert alert-danger alert-dismissible hide">
                        <h4><i aria-hidden="true" class="icon fa fa-ban"></i>
                            Errors
                        </h4>
                        <ul></ul>
                    </div>

                    <div class="alert alert-success alert-dismissible hide">
                        Created.
                    </div>

                    <form>

                        @method('PUT')

                        <div class="card">

                            <div class="row">

                                <div class="form-group col-xs-12 col-md-3">

                                    <label><strong>{{ trans('adminlte_lang::message.client') }}:</strong></label>

                                    {{$result['client']['title']}}

                                </div>

                            </div>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">{{ trans('adminlte_lang::message.product') }}</th>
                                    <th scope="col" width="120">{{ trans('adminlte_lang::message.quantity') }}</th>
                                    <th scope="col" width="120">{{ trans('adminlte_lang::message.price') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($quant = 0)
                                @foreach($result['products'] as $product)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">{{$product['title']}}</div>
                                            </div>
                                        </td>
                                        <td>{{$product['pivot']['quantity']}}</td>
                                        <td>
                                            <div class="price-wrap">
                                                <var>R$ {{number_format(($product['pivot']['price'] * $product['pivot']['quantity']),2,',','.')}}</var>
                                            </div>
                                        </td>
                                    </tr>

                                    @php($quant += $product['pivot']['quantity'])
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
                                                        <label><strong>{{ trans('adminlte_lang::message.discount') }}:</strong></label>
                                                        R$ {{number_format($result['discount'],2,',','.')}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label><strong>{{ trans('adminlte_lang::message.paid') }}?</strong></label>
                                                        {{$result['paid'] ? trans('adminlte_lang::message.yes') : trans('adminlte_lang::message.no')}}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-md-3 text-right">

                                            <p><h4 class="text-bold">{{ trans('adminlte_lang::message.overview_order') }}</h4></p>

                                            <p>
                                                <strong>{{ trans('adminlte_lang::message.subtotal') }}</strong>
                                                <strong class="text-lowercase">
                                                    (<span class="order-total-product">{{$quant}}</span> {{ trans('adminlte_lang::message.product') }}(s)):
                                                </strong>
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

                                        </div>

                                    </div>

                                </div>

                                <div class="col-xs-12">

                                    <a href="{{ route('order.index') }}" class="btn btn-default pull-left">{{ trans('adminlte_lang::message.back') }}</a>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </section>

@endsection
