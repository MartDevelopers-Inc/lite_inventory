<!-- Udpate Modal -->
<div class="modal fade" id="update_<?php echo $users->user_id; ?>">
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
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="user_name" value="<?php echo $users->user_name; ?>" required class="form-control">
                            <input type="hidden" name="user_id" value="<?php echo $users->user_id; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email Address</label>
                            <input type="email" name="user_email" value="<?php echo $users->user_email; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone Number</label>
                            <input type="text" name="user_phoneno" value="<?php echo $users->user_phoneno; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="default-06">Allocated Store</label>
                            <div class="form-control-wrap">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select name="user_store_id" class="form-select form-control form-control-lg" data-search="on">
                                            <option value="<?php echo $users->user_store_id; ?>"><?php echo $users->store_name; ?></option>
                                            <?php
                                            $raw_results = mysqli_query($mysqli, "SELECT * FROM store_settings WHERE store_status = 'active'");
                                            if (mysqli_num_rows($raw_results) > 0) {
                                                while ($stores = mysqli_fetch_array($raw_results)) {
                                            ?>
                                                    <option value="<?php echo $stores['store_id']; ?>"><?php echo $stores['store_name']; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="default-06">User Access Level</label>
                            <div class="form-control-wrap">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select name="user_access_level" class="form-select form-control form-control-lg" data-search="on">
                                            <?php if ($users->user_access_level == 'Admin') { ?>
                                                <option value="Admin">Administrator</option>
                                            <?php } else if ($users->user_access_level == 'Staff') { ?>
                                                <option value="Staff">Staff</option>
                                            <?php } else { ?>
                                                <option value="Manager">Manager</option>
                                            <?php } ?>
                                            <option value="Staff">Staff</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Admin">Administrator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="text-right">
                        <button name="update_user" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-list-check"></em> Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Udpate Modal -->

<!-- Change Password -->
<div class="modal fade" id="change_password_<?php echo $users->user_id; ?>">
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
                            <label>New Password</label>
                            <input type="hidden" name="user_id" value="<?php echo $users->user_id; ?>" required class="form-control">
                            <input type="password" name="new_password" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" required class="form-control">
                        </div>
                    </div><br><br>
                    <div class="text-right">
                        <button name="Change_Password" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-lock"></em> Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $users->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body text-center ">
                    <h4 class="text-danger">
                        Delete <?php echo $users->user_name; ?>'s account? <br>
                        This operation is delicate. Kindly enter your password to delete.
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="user_id" value="<?php echo $users->user_id; ?>">
                    <input type="hidden" name="user_details" value="<?php echo $users->user_name . ' ' . $users->user_email; ?>">
                    <div class="form-group col-md-12">
                        <input type="password" required name="user_password" class="form-control">
                    </div>
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal"><em class="icon ni ni-cross-round"></em> No</button>
                    <button type="submit" name="close_account" class="text-center btn btn-danger"><em class="icon ni ni-trash-fill"></em> Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete Modal -->