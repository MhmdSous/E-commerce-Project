@extends('admin.admin_master')
@section('admin')
{{-- like partner  --}}

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">partner List</h3>
                                <button type="button" style="float: right;" class="btn btn-rounded btn-success mb-5"
                                    data-toggle="modal" data-target="#partnerModal" id="modal">Add partner</button>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>partner_id</th>
                                                <th>name</th>
                                                <th>logo</th>
                                                <th width="25%">Action</th>
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

    <!-- partner Modal -->
    <div class="modal fade" id="partnerModal" tabindex="-1" role="dialog" aria-labelledby="partnerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partnerModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createpartnerForm" action="javascript:void(0)" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name">partner Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter partner Name">
                    </div>
                    <div class="form-group">
                        <label for="logo">partner logo</label>
                        <input type="file" class="form-control" id="logo" name="logo"
                            placeholder="Enter partner logo">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" data-dismiss="modal"><i class="ti-trash"></i> Close</button>
                <button type="button" class="btn btn-rounded btn-primary btn-outline" id="savepartnerButton"><i class="ti-save-alt"></i>Save</button>
            </div>
        </div>
    </div>
    </div>

    <!-- End of partner Modal -->
@endsection
@section('scripts')
    <!-- Add necessary JS files -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function($) {

            var partner_tbl = $('#example1').DataTable({
                serverSide: true,
                processing: true,

                ajax: {
                    url: 'partners/all',
                    type: 'get',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'logo',

                        name: 'logo',
                        render: function(data, type, full, meta) {
                            return '<img src="' + "{{ asset('storage') }}" + '/' + data +
        '" width="100" height="100" />';

                            }
                    },
                    {
                        data: 'actions'
                    }


                ],
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#modal').click(function() {
                $('#createpartnerForm').trigger("reset");
                $('#partnerModalLabel').html("Add partner");
                $('#savepartnerButton').html("save");

                $('#partnerModal').modal('show');
            });

            $('body').on('click', '.edit', function() {
                $('#partnerModalLabel').html("Edit partner");
                $('#savepartnerButton').html("update");
                $('#partnerModal').modal('show');
                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type: "get",
                    url: "{{ url('partners/') }}" + '/' + id + '/edit',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {

                        $('#partnerModalLabel').html("Edit partner");
                        $('#savepartnerButton').html("update");

                        $('#id').val(res.data.id);
                        $('#name').val(res.data.name);



                    },
                    error: function(error) {
                        $("#savepartnerButton").html('update');

                    }
                });

            });

            $('body').on('click', '.delete', function() {


                var id = $(this).data('id');


                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('partners') }}" + '/' + id,
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        toastr.success(res.message);
                        partner_tbl.draw();
                    }

                });


            });

            $('body').on('click', '#savepartnerButton', function(event) {

                // var id = $("#id").val();
                // var name = $("#name").val();
                // var logo = $("#logo").val();
                var formData = new FormData($('#createpartnerForm')[0]);
                $("#savepartnerButton").html('Please Wait...');
                $("#sasavepartnerButtonve").attr("disabled", true);

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ route('partners.store') }}",
                    data: formData,
                    contentType: false,
                        processData: false,
                    dataType: 'json',
                    success: function(res) {

                        // becuse of datatable contain function make drow to table
                        // window.location.reload();
                        $("#savepartnerButtone").html('Submit');
                        $("#savepartnerButton").attr("disabled", false);
                        $('#partnerModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        partner_tbl.draw();
                        toastr.success(res.message);


                    },
                    error: function(error) {
                        $("#savepartnerButton").html('save');
                        toastr.error(error.responseJSON.message);
                    }
                });

            });

        });
    </script>

@endsection

