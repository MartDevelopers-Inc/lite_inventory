<div class="modal fade" id="update_<?php echo $expenses->expense_id; ?>">
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
                            <label>Expense Name</label>
                            <input type="hidden" name="expense_id" value="<?php echo $expenses->expense_id; ?>" required class="form-control">
                            <input type="text" name="expense_name" value="<?php echo $expenses->expense_name; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Expense Amount</label>
                            <input type="number" name="expense_amount" value="<?php echo $expenses->expense_amount; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Expense Date</label>
                            <input type="date" name="expense_date" value="<?php echo $expenses->expense_date; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Expense Details</label>
                            <textarea type="text" rows="1" name="expense_details" class="form-control"><?php echo $expenses->expense_details; ?></textarea>
                        </div>
                    </div><br><br>
                    <div class="text-right">
                        <button name="Update_Expense" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-save"></em> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>