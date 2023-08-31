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
                                <h3 class="box-title">Product List</h3>
                                <button type="button" data-backdrop="false" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#productModal"
                                    id="modal">Add product</button>


                                <div>
                                    <button type="button" class="btn btn-secondary buttons-pdf buttons-html5"
                                        tabindex="0" aria-controls="example"
                                        onclick="window.location='{{ route('excel') }}'">Export Excel</button>
                                    <button type="button" class="btn btn-secondary buttons-pdf buttons-html5"
                                        tabindex="0" aria-controls="example"
                                        onclick="window.location='{{ route('pdf') }}'">Export PDF</button>

                                </div>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <div id="example_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <div class="dt-buttons btn-group">
                                        </div>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>Cover image</th>
                                                <th>category Name</th>
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


    <!-- product Modal -->
 @include('backend.products._modal')
    <!-- End of product Modal -->

@endsection
@section('scripts')
    @include('backend.products.productScript')
@endsection
