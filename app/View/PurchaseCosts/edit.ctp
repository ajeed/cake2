<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cost Incurred</h1>
    </div>
    <!-- /.col-lg-12 -->
 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <?php echo __('Edit Purchase Cost'); ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo $this->Form->create('PurchaseCost',array('role'=>'form')); ?>
                            <div class="form-group">
                            	<?php echo $this->Form->input('lookup_id',array('label'=>'Item Category','class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('amount',array('label'=>'Total Amount','class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('receipt_no',array('label'=>'Receipt No','class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('remarks',array('label'=>'Remarks','class'=>'form-control')); ?>
                            </div>
                            <?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
                            <button type="submit" class="btn btn-default">Submit</button>
                            <?php
							echo $this->Form->button('Cancel', array(
							    'type' => 'button',
							    'onclick' => 'window.history.back();',
							    'class'=>'btn btn-default',
							    ));
                            ?>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

