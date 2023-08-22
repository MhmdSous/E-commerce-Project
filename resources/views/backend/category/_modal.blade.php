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
            <form id="createCategoryForm" action="javascript:void(0)" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <label for="image">Category Image</label>
                    <input type="file" class="form-control" id="image" name="image"
                        placeholder="Enter Category Image">
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
