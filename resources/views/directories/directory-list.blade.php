@extends('layouts.master')
@section('main-content')
    <style>
        .alert-warning {
            color: #8a6d3b !important;
            background-color: #FCF8B2 !important;
            border-color: #faebcc !important;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product
            <small>Product details.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Directory List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('layouts.alert-msg')
        <div class="row">

            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box box-primary">
                    <div class="box-header">
                        <form action="{{route('directory.index')}}" method="GET" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control " placeholder="Search by name..." name="search" id="srch-term">
                                <div class="input-group-btn">
                                    {{--<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>--}}
                                    <button type="submit" class="btn btn-info btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="customer-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Name</th>
                                <th>Batch & Dept</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Blood Group</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($directories as $directory)
                                <tr>
                                    <td>{!! $directory->id !!}</td>
                                    <td>{!! $directory->name !!}</td>
                                    <td>{!! $directory->batch_and_dept !!}</td>
                                    <td>{!! $directory->email !!}</td>
                                    <td>{!! $directory->mobile !!}</td>
                                    <td>{!! $directory->blood_group !!}</td>
                                    <td>
                                        @if($directory->avatar != null)
                                            <img src="/images/directory/thumb/thumb_200x200_{{ $directory->avatar }}"
                                                 class="profile-user-img img-responsive img-circle" alt="Avatar">
                                        @else
                                            <img src="https://placeholdit.imgix.net/~text?txtsize=50&txt={{substr(ucwords
                                                ($directory->name), 0, 1)}}&w=100&h=100" alt="Avatar" class="profile-user-img
                                                img-responsive img-circle"/>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="tableAction">
                                            <button class="btn btn-xs btn-primary directory-modal"
                                                    data-source="directory/{{$directory->id}}"
                                                    data-modal-title="Directory:">
                                                <i class="glyphicon glyphicon-eye-open"></i>
                                            </button>
                                            <a class="btn btn-xs btn-danger" onclick="return confirm('Are You sure to delete this?')" href="{{route('directory.destroy', $directory->id)}}">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID#</th>
                                <th>Name</th>
                                <th>Batch & Dept</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Blood Group</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                        {!! $directories->render() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- Modal  add directory Form-->
    <div class="modal fade" id="directory-popup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="panel panel-info">
                <div class="panel-heading panel-info">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <br>
                    <div class="alert alert-success" role="alert" id="add-success"
                         style="display: none;"></div>
                    <div class="alert alert-danger" role="alert" id="add-failed"
                         style="display: none;"></div>
                </div>
                <div class="panel-body">
                    <div id="callback-data"></div>
                </div>
                <div id="modal-footer"></div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script>
        $(document).ready(function () {
            // get add product form
            $(".directory-modal").click(function (e) {
                var modalText = $(this).data('modal-title');
                $('.modal-title').text(modalText); // Set Title to Bootstrap modal title
                $("#directory-popup-modal").modal('show');
                var pageUrl = $(this).data('source');

                $.ajax({
                    type: "GET",
                    url: pageUrl,
                    beforeSend: function () {
                        $("#callback-data").html('<div class="overlay loader-div"><i class="fa fa-refresh fa-spin"></i></div>');
                    },
                    success: function (data) {
                        $("#callback-data").html(data);
                    },
                    error: function () {
                        $("#callback-data").html("Failed to load data.");
                        $("#modal-footer").html('<div class="modal-footer">' +
                            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                            '</div>');
                    }
                });
                e.preventDefault();
            });
        });
    </script>
@endsection