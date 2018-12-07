@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

    <section class="content">

        <div class="row">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.listing') }}</h3>
                    <div class="box-tools pull-right">

                        <div class="btn-group">

                            <a href="{{ route('client.create') }}" class="btn btn-success btn-md">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                {{ trans('adminlte_lang::message.create') }}
                            </a>

                        </div>

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    @include('adminlte::components.errors')
                    @include('adminlte::components.message')

                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="hidden-xs">{{ trans('adminlte_lang::message.cnpj') }}</th>
                            <th>{{ trans('adminlte_lang::message.title') }}</th>
                            <th>-</th>
                            <th>-</th>
                        </tr>
                        @foreach($results as $result)
                            <tr>
                                <td style="width: 10px">{{$result['id']}}</td>
                                <td class="hidden-xs">{{$result['cnpj']}}</td>
                                <td>{{$result['title']}}</td>
                                <td>
                                    <a href="{{ route('client.edit', [ 'id' => $result['id'] ]) }}"
                                       class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        {{ trans('adminlte_lang::message.edit') }}
                                    </a>
                                </td>
                                <td>

                                    <form method="POST"
                                          action="{{ route('client.destroy', [ 'id' => $result['id'] ]) }}"
                                          class="display-inline" role="form">

                                        <input type="hidden" name="_method" value="DELETE">

                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger btn-sm btn-delete"
                                                title="{{ trans('adminlte_lang::message.delete') }}"
                                                data-destroy>
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            {{ trans('adminlte_lang::message.delete') }}
                                        </button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

                <div class="box-footer clearfix">
                    <div class="pull-right">
                        {{$results->links()}}
                    </div>
                </div>

            </div>
            <!-- /.box -->
        </div>
    </section>

@endsection
