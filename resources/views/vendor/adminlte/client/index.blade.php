@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

    <section class="content">

        <div class="row">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Bordered Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    @include('adminlte::components.errors')
                    @include('adminlte::components.message')

                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>CNPJ</th>
                            <th>Título</th>
                            <th style="width: 10px">-</th>
                            <th style="width: 10px">-</th>
                        </tr>
                        @foreach($results as $result)
                            <tr>
                                <td style="width: 10px">{{$result['id']}}</td>
                                <td>{{$result['cnpj']}}</td>
                                <td>{{$result['title']}}</td>
                                <td>
                                    <a href="{{ route('client.edit', [ 'id' => $result['id'] ]) }}"
                                       class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        {{ __('Edit') }}
                                    </a>
                                </td>
                                <td>

                                    <form method="POST"
                                          action="{{ route('client.destroy', [ 'id' => $result['id'] ]) }}"
                                          class="display-inline" role="form">

                                        <input type="hidden" name="_method" value="DELETE">

                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger btn-sm" title="{{ __('Destroy') }}"
                                                data-destroy>
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            {{ __('Destroy') }}
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
