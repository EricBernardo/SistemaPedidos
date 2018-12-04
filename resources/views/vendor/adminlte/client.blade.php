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
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>CNPJ</th>
                            <th>{{ trans('adminlte_lang::message.title') }}</th>
                            <th style="width: 40px">-</th>
                            <th style="width: 40px">-</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>163.645.67765/76</td>
                            <td>Cliente 1</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm btn-flat">Editar</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm btn-flat">Excluir</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>

@endsection
