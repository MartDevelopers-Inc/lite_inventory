<!-- Udpate Modal -->
<div class="modal fade" id="update_<?php echo $products->product_id; ?>">
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
                        <div class="form-group col-md-8">
                            <label>Item Name</label>
                            <input type="text" name="product_name" value="<?php echo $products->product_name; ?>" required class="form-control">
                            <input type="hidden" name="product_id" value="<?php echo $products->product_id; ?>" required class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Item Code</label>
                            <input type="text" name="product_code" value="<?php echo $products->product_code; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Item Quantity</label>
                            <input type="text" name="product_quantity" value="<?php echo $products->product_quantity; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Item Purchase Price (Ksh)</label>
                            <input type="text" name="product_purchase_price" value="<?php echo $products->product_purchase_price; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Item Retail Sale Price (Ksh)</label>
                            <input type="text" name="product_sale_price" value="<?php echo $products->product_sale_price; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Items Store</label>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <select name="product_store_id" class="form-select form-control form-control-lg" data-search="on">
                                        <option value="<?php echo $products->product_store_id; ?>"><?php echo $products->store_name; ?></option>
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
                        <div class="form-group col-md-12">
                            <label>Item Description</label>
                            <textarea type="text" name="product_description" rows="3" required class="form-control"><?php echo $products->product_description; ?></textarea>
                        </div>
                    </div>
                    <br><br>
                    <div class="text-right">
                        <button name="update_item" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-list-check"></em> Update Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $products->product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        Delete <?php echo  $products->product_name; ?> ?
                        <hr>
                        This operation is delicate. Please confirm your password before deleting above product
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="product_id" value="<?php echo $products->product_id; ?>">
                    <input type="hidden" name="product_details" value="<?php echo $products->product_code . ' ' . $products->product_name; ?>">
                    <div class="form-group col-md-12">
                        <input type="password" required name="user_password" class="form-control">
                    </div>
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal"><em class="icon ni ni-cross-round"></em> No</button>
                    <button type="submit" class="text-center btn btn-danger" name="delete_item"> <em class="icon ni ni-trash-fill"></em> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete Modal -->