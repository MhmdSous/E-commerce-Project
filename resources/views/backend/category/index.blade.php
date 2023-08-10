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
                                <h3 class="box-title">Category List</h3>
                                <button type="button" style="float: right;" class="btn btn-rounded btn-success mb-5"
                                    data-toggle="modal" data-target="#categoryModal" id="modal">Add Category</button>
                                <div>
                                    <a href="{{ route('categories.export.excel') }}" class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example">Export
                                        Excel</a>
                                    <a href="{{ route('categories.export.pdf') }}" class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example">Export PDF</a>
                                </div>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>category_id</th>
                                                <th>name</th>
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

    <!-- Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createCategoryForm" action="javascript:void(0)">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Category Name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" data-dismiss="modal"><i class="ti-trash"></i> Close</button>
                    <button type="button" class="btn btn-rounded btn-primary btn-outline" id="saveCategoryButton"><i class="ti-save-alt"></i>Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Category Modal -->
@endsection
@section('scripts')
    <!-- Add necessary JS files -->
@include('backend.category.categoryScripts')
@endsection
