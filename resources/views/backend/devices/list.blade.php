@extends('backend.index')

@section('content')

    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Device Details List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Device Id</th>
                            <th>Device Label</th>
                            <th>Reported At</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($devices as $list)
                            <tr>
                                <td>{{$list->device_id}}</td>
                                <td>{{$list->device_label}}</td>
                                <td>
                                    {{ $list->reported_at }}
                                </td>
                                <td>
                                    @if($list->status == 'OK')
                                        <span class="label label-success">OK</span>
                                    @elseif($list->status == 'OFFLINE')
                                        <span class="label label-danger">OFFLINE</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- page script -->

    <script>

        $(document).ready(function () {
            $('#example1').DataTable({

                "ordering": false,

            });
        });

    </script>

@endsection