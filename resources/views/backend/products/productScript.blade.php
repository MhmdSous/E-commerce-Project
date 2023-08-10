<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('../assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {




        var product_tbl = $('#example1').DataTable({
            serverSide: true,
            processing: true,
            processing: '<img src="{{ asset('storage') . '/' }}"> Loading...',

            ajax: {
                url: 'products/all',
                type: 'get',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(data, type, full, meta) {
                        return ++meta.row;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, full, meta) {
                        return '<img src="{{ asset('storage') . '/' }}' + data +
                            '" width="100" height="100" />';
                    }
                },
                {
                    data: 'category_name',
                    name: 'category_name',
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

            $('#createproductForm').trigger("reset");
            $('#productModalLabel').html("Add product");
            $('#saveproductButton').html("save");
            $('#productModal').modal('show');
            product_tbl.draw();

        });


        $('body').on('click', '.edit', function() {
            $('#productModalLabel').html("Edit product");
            $('#saveproductButton').html("update");
            $('#productModal').modal('show');

            var id = $(this).data('id');

            // ajax
            $.ajax({
                type: "get",
                url: "{{ url('products/') }}" + '/' + id + '/edit',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {

                    $('#productModalLabel').html("Edit product");
                    $('#saveproductButton').html("update");

                    $('#id').val(res.data.id);
                    $('#name').val(res.data.name);
                    $('#category_name').val(res.data.category_id);
                    $('#image').val(res.data.image);




                },
                error: function(error) {
                    $("#saveproductButton").html('update');

                }
            });

        });

        $('body').on('click', '.delete', function() {


            var id = $(this).data('id');


            // ajax
            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('products') }}" + '/' + id,
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        toastr.success(res.message);
                        product_tbl.draw();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        toastr.error('An error occurred while deleting the product.');
                    }

                });

            } else {
                return;
            }
        });

        $('body').on('click', '#saveproductButton', function(event) {

            // var id = $("#id").val();
            // var name = $("#name").val();
            // var image = $("#image").val();
            // var category_id = $("#category_name").val();

            var formData = new FormData($('#createproductForm')[0]);
            $("#saveproductButton").html('Please Wait...');
            $("#sasaveproductButtonve").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ route('products.store') }}",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(res) {

                    // becuse of datatable contain function make drow to table
                    // window.location.reload();
                    $("#saveproductButtone").html('Submit');
                    $("#saveproductButton").attr("disabled", false);
                    $('#productModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    product_tbl.draw();
                    toastr.success(res.message);


                },
                error: function(error) {
                    $("#saveproductButton").html('save');
                    toastr.error(error.responseJSON.message);
                }
            });

        });

        // $('body').on('click', '#savegalleryButton', function(event) {


        //     var formData = new FormData($('#createGalleryForm')[0]);
        //     $("#savegalleryButton").html('Please Wait...');
        //     $("#savegalleryButton").attr("disabled", true);

        //     // ajax
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('products.gallery.store') }}",
        //         data: formData,
        //         dataType: 'json',
        //         contentType: false,
        //         processData: false,
        //         success: function(res) {

        //             // becuse of datatable contain function make drow to table
        //             // window.location.reload();
        //             $("#savegalleryButton").html('Submit');
        //             $("#savegalleryButton").attr("disabled", false);
        //             $('#galleryModal').modal('hide');
        //             $('body').removeClass('modal-open');
        //             $('.modal-backdrop').remove();
        //             product_tbl.draw();
        //             toastr.success(res.message);


        //         },
        //         error: function(error) {
        //             $("#savegalleryButton").html('Save');
        //             $("#savegalleryButton").attr("disabled", false);

        //             toastr.error(error.responseJSON.message);
        //         }
        //     });

        // });

        // $(document).on('click', '.gallery', function() {
        //     var product_id = $(this).data('id');
        //     $('#createGalleryForm').trigger("reset");
        //     $('#galleryModalLabel').html("Add Product Image");
        //     $('#savegalleryButton').html("Save Image");
        //     $('#createGalleryForm #product_id').val(product_id);
        //     $('#galleryModal').modal('show');
        // });



    });

    new Dropzone("#image", {
    thumbnailWidth: 200,
    maxFiles: 1,
    success: function(file, response) {
        // Check if response contains success or error information
        if (response && response.success) {
            swal({
                text: "Success",
                type: "success",
                timer: 300
            });
        } else {
            swal({
                text: "Upload failed",
                type: "error",
                timer: 300
            });
        }
    },
});

</script>
