<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $sales->sale_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        Delete <?php echo  $sales->product_name; ?> Sale Record ?
                        <hr>
                        This operation is delicate. Please confirm your password before rolling back the above product sale record.
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="sale_id" value="<?php echo $sales->sale_id; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $sales->sale_product_id; ?>">
                    <input type="hidden" name="sale_quantity" value="<?php echo $sales->sale_quantity ?>">
                    <input type="hidden" name="log_details" value="Cancelled <?php echo $sales->product_code . ' ' . $sales->product_name . ' Receipt Number #:' . $sales->sale_receipt_no; ?> Sale Record.">
                    <div class="form-group col-md-12">
                        <input type="password" required name="user_password" class="form-control">
                    </div>
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <input type="submit" name="delete_sale" value="Delete" class="text-center btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete Modal -->