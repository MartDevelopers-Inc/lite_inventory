<!-- Update And Delete Modals -->
<div class="modal fade" id="update_store_<?php echo $stores['store_id']; ?>">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fill All Required Fields</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Store Name</label>
                            <input type="text" value="<?php echo $stores['store_name']; ?>" name="store_name" required class="form-control">
                            <input type="hidden" value="<?php echo $stores['store_id']; ?>" name="store_id" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Store Email</label>
                            <input type="text" value="<?php echo $stores['store_email']; ?>" name="store_email" required class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Store Address</label>
                            <textarea type="text" name="store_adr" rows="3" required class="form-control"><?php echo $stores['store_adr']; ?></textarea>
                        </div>
                    </div>
                    <br><br>
                    <div class="text-right">
                        <button name="update_store" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-list-check"></em> Update Store
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="delete_store_<?php echo $stores['store_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM CLOSING</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body text-center">
                    <h4 class="text-danger">
                        Close <?php echo $stores['store_name']; ?> Store ?
                        <hr>
                        This operation is delicate. Please confirm your password before closing above store.
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="store_id" value="<?php echo $stores['store_id']; ?>">
                    <input type="hidden" name="store_name" value="<?php echo $stores['store_name']; ?>">
                    <div class="form-group col-md-12">
                        <input type="password" required name="user_password" class="form-control">
                    </div>
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal"> <em class="icon ni ni-cross-round"></em>No</button>
                    <button type="submit" name="delete_store" value="Close" class="text-center btn btn-danger" type="button"><em class="icon ni ni-lock-alt"></em> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Re Open Store -->
<div class="modal fade" id="re_open_<?php echo $stores['store_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM RE OPENING</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body text-center">
                    <h4 class="text-danger">
                        Re Open <?php echo $stores['store_name']; ?> Store ?
                        <hr>
                        This operation is delicate. Please confirm your password before re opening the above store.
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="store_id" value="<?php echo $stores['store_id']; ?>">
                    <input type="hidden" name="store_name" value="<?php echo $stores['store_name']; ?>">
                    <div class="form-group col-md-12">
                        <input type="password" required name="user_password" class="form-control">
                    </div>
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal"> <em class="icon ni ni-cross-round"></em> No</button>
                    <button type="submit" name="re_open" class="text-center btn btn-danger"><em class="icon ni ni-list-check"></em> Re Open Store</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modals -->