@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Contact List</h3>



                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>message</th>
                                                <th width="25%">action</th>

                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Add necessary JS files -->
    <script>
        $(document).ready(function($) {
            var url = "{{ route('contactUs') }}"
            var tbl = $('#example1').DataTable({
                serverSide: true,
                processing: true,

                ajax: {
                    url: url,
                    type: 'get',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',

                        name: 'email',

                    },
                    {
                        data: 'message',

                        name: 'message',

                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }


                ],
            });

            // make delete button
            $(document).on('click', '.deleteContact', function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // use toster for confirm message
                if (confirm("Are you sure you want to delete this data?")) {
                    $.ajax({
                        url: "{{ url('admin/contact_us/delete') }}" + '/' + id,
                        type: "POST",
                        data: {
                            id: id,
                        },
                        success: function(res) {
                            toastr.success(res.message);
                            tbl.ajax.reload();
                        }
                    });
                } else {
                    return false;
                }


            });
        });
    </script>
@endsection
