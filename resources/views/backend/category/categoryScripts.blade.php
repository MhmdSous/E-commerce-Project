
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">
    $(document).ready(function($) {

        var category_tbl = $('#example1').DataTable({
            serverSide: true,
            processing: true,

            ajax: {
                url: 'categories/all',
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
            $('#createCategoryForm').trigger("reset");
            $('#categoryModalLabel').html("Add Category");
            $('#saveCategoryButton').html("save");

            $('#categoryModal').modal('show');
        });

        $('body').on('click', '.edit', function() {
            $('#categoryModalLabel').html("Edit Category");
            $('#saveCategoryButton').html("update");
            $('#categoryModal').modal('show');
            var id = $(this).data('id');

            // ajax
            $.ajax({
                type: "get",
                url: "{{ url('categories/') }}" + '/' + id + '/edit',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {

                    $('#categoryModalLabel').html("Edit Category");
                    $('#saveCategoryButton').html("update");

                    $('#id').val(res.data.id);
                    $('#name').val(res.data.name);


                },
                error: function(error) {
                    $("#saveCategoryButton").html('update');

                }
            });

        });

        $('body').on('click', '.delete', function() {


            var id = $(this).data('id');


            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('categories') }}" + '/' + id,
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    toastr.success(res.message);
                    category_tbl.draw();
                }

            });


        });

        $('body').on('click', '#saveCategoryButton', function(event) {

            var id = $("#id").val();
            var name = $("#name").val();

            $("#saveCategoryButton").html('Please Wait...');
            $("#sasaveCategoryButtonve").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ route('categories.store') }}",
                data: {
                    id: id,
                    name: name,

                },
                dataType: 'json',
                success: function(res) {

                    // becuse of datatable contain function make drow to table
                    // window.location.reload();
                    $("#saveCategoryButtone").html('Submit');
                    $("#saveCategoryButton").attr("disabled", false);
                    $('#categoryModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    category_tbl.draw();
                    toastr.success(res.message);


                },
                error: function(error) {
                    $("#saveCategoryButton").html('save');
                    toastr.error(error.responseJSON.message);
                }
            });

        });

    });
</script>
