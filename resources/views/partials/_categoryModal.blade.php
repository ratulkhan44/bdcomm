<div class="modal fade bd-example-modal-lg" id="category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProject" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputName" placeholder="Category Name">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio radio-primary custom-control">
                                        <input type="radio" id="customRadioInline1" name="gridRadios" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio radio-primary custom-control">
                                        <input type="radio" id="gridRadios2" name="gridRadios" class="custom-control-input">
                                        <label class="custom-control-label" for="gridRadios2">Inactive</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </fieldset>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-outline-primary btn-floating">Create</button>
                            </div>
                        </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>