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
                                                <th>product_id</th>
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
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="createproductForm" action="javascript:void(0)" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name">product Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter product Name">
                        </div>
                        <div class="form-group">
                            <label for="image">product cover Image</label>
                            <input type="file" class="form-control " id="image" name="image">
                     

                        </div>

                        <div class="form-group">
                            <label for="gallery">Product gallery Images </label>
                            <input type="file" class="form-control" id="gallery" name="gallery[]" multiple>
                        </div>

                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id" id="category_name">
                                <option selected="selected">Please Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                 name="category_id" id="category_name">
                                <option selected="selected">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select><span
                                class="select2 select2-container select2-container--default select2-container--below"
                                dir="ltr" style="width: 100%;"><span class="selection"><span
                                        class="select2-selection select2-selection--single" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="0"
                                        aria-labelledby="select2-o90q-container"><span class="select2-selection__rendered"
                                            id="select2-o90q-container" title="Select Category">Select Category</span><span
                                            class="select2-selection__arrow" role="presentation"><b
                                                role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                    aria-hidden="true"></span></span>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" data-dismiss="modal"><i
                            class="ti-trash"></i>Close</button>
                    <button type="button" class="btn btn-rounded btn-primary btn-outline"
                        id="saveproductButton">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of product Modal -->
    <!-- gallery Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="createGalleryForm" action="javascript:void(0)" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" id="product_id">

                        <div class="form-group">
                            <label for="image">product Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        {{-- <div class="form-group">
                            <label for="product_id">Product Name</label>

                            <select class="form-control" name="product_id" id="product_id" style="width: 100%;">
                                <option>Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" data-dismiss="modal"><i
                            class="ti-trash"></i>Close</button>
                    <button type="button" class="btn btn-rounded btn-primary btn-outline" id="savegalleryButton"><i
                            class="ti-save-alt"></i>Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of gallery Modal -->
@endsection
@section('scripts')
    @include('backend.products.productScript')
@endsection
