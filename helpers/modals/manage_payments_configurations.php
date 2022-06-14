<!-- Update And Delete Modals -->
<div class="modal fade" id="manage_store_payment_mode_<?php echo $stores['store_id']; ?>">
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
                            <label>Allowed Payment Means Other Than Cash Payments</label>
                            <select name="payment_settings_means" class="form-select form-control form-control-lg" data-search="on">
                                <option value="MPESA">MPESA</option>
                                <option value="Cedit / Debit Card">Cedit / Debit Card</option>
                            </select>
                            <input type="hidden" value="<?php echo $stores['store_id']; ?>" name="payment_settings_store_id" required class="form-control">
                            <input type="hidden" value="<?php echo $stores['store_name']; ?>" name="store_details" required class="form-control">
                        </div>
                    </div>
                    <br><br>
                    <div class="text-right">
                        <button name="update_payments" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-list-check"></em> Update Payment Means
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>