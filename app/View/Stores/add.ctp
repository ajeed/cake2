<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Purchasing</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
	<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Vehicle Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php echo $this->Form->create('Store',array('role'=>'form')) ?>
                    <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label>Car Registration No</label>
                                <?= $this->Form->input('Store.reg_no', array(
                                   'label' => false,
                                    'id' => 'reg-no',
                                    'class' => 'form-control',
                                    'required'=>'required',
                                    'div' => false)); 
                                    ?>
                            </div>

                             <div class="form-group">
                                <div class="control-group">
                                    <label>Make / Model</label>
                                    <div class="controls form-inline">
                                        <?php echo $this->Form->input('Store.make_id', array(
                                            'label' => false,
                                            'type' => 'select',
                                            'id' => 'make-name',
                                            'class' => 'form-control',
                                            'empty' => '(Choose One)',
                                            'div' => false)); 
                                        ?>
                                    /
                                        <select name="data[Store][mod_id]" id="model-name" class="form-control">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function() {

                                  $('#make-name').change(function() {
                                    var value = $(this).val();
                                    console.log(value);
                                    $.getJSON("<?=$this->Html->url(array('controller' => 'makes', 'action' => 'getModel'));?>" + "/"+value, function(data) {
                                        var items = "";
                                        items += "<option value=0> -- </option>";
                                        $.each(data,function(k,v) {
                                            items += "<option value='" + k + "'>" + v + "</option>";
                                        });
                                      $("#model-name").html(items);

                                    });
                                  })
                                });
                                </script>
                            <div class="form-group">
                                <label>Title</label>
                                <?= $this->Form->input('Store.title', array(
                                   'label' => false,
                                    'id' => 'title',
                                    'class' => 'form-control',
                                    'div' => false)); 
                                    ?>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <label>Year Made / Register</label>
                                    <div class="controls form-inline">
                                        <?php 
                                        echo $this->Form->year('year_of_made', 1980, date('Y'),array(
                                                'class'         => 'form-control',
                                                'label'         => false,
                                            ));
                                        ?>
                                        /
                                        <?php 
                                        echo $this->Form->year('year_of_reg', 1980, date('Y'),array(
                                                'class'         => 'form-control',
                                                'label'         => false,
                                            ));
                                        ?>
                                    </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <label>Engine No</label>
                                <?= $this->Form->input('Store.engine_no', array(
                                   'label' => false,
                                    'id' => 'engine-no',
                                    'class' => 'form-control',
                                    'div' => false)); 
                                    ?>
                            </div>
                             <div class="form-group">
                                <label>Chassis No</label>
                               <?= $this->Form->input('Store.chassis_no', array(
                                   'label' => false,
                                    'id' => 'chassis-no',
                                    'class' => 'form-control',
                                    'div' => false)); 
                                    ?>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <?php echo $this->Form->checkbox('Store.walk_in',array(
                                    'label' => false,
                                    'class' => 'checkbox-inline',
                                )); ?> <strong>Walk In</strong>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Purchase Price</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">RM</span>
                                    <?= $this->Form->input('Store.price', array(
                                       'label' => false,
                                        'id' => 'price',
                                        'class' => 'form-control',
                                        'div' => false)); 
                                    ?>
                                    <span class="input-group-addon">.00</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <?php echo $this->Form->checkbox('Store.under_finance',array(
                                    'label' => false,
                                    'class' => 'checkbox-inline',
                                )); ?> <strong>Under Finance</strong>
                                </label>
                            </div>
                            <div class="form-group">
                                    <label>Description</label>
                                    <?= $this->Form->textarea('Store.remarks', array(
                                       'label' => false,
                                        'id' => 'remarks',
                                        'class' => 'form-control',
                                        'div' => false)); 
                                    ?>
                            </div>
                            
                        
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Add Related Documents
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Please fill-in the checklist for related document</label>
                                    <div class="checkbox">
                                        <label>
                                            <?php echo $this->Form->checkbox('Document.0.grant_ori',array(
                                                'label' => false,
                                            )); ?>
                                            Geran Original
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <?php echo $this->Form->checkbox('Document.0.seller_ic',array(
                                                'label' => false,
                                            )); ?>
                                            Owner IC copy
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <?php echo $this->Form->checkbox('Document.0.auth_letter',array(
                                                'label' => false,
                                            )); ?>
                                            Authorize letter
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <?php echo $this->Form->checkbox('Document.0.stms',array(
                                                'label' => false,
                                            )); ?>
                                            STMS
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <?= $this->Form->textarea('Document.0.remarks', array(
                                           'label' => false,
                                            'id' => 'doc-remarks',
                                            'class' => 'form-control',
                                            'div' => false)); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Add Broker Details
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Owner Name</label>
                                    <?= $this->Form->input('Store.seller_name', array(
                                           'label' => false,
                                            'id' => 'seller-name',
                                            'class' => 'form-control',
                                            'div' => false)); 
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label>Owner Phone No.</label>
                                    <?= $this->Form->input('Store.seller_tel', array(
                                           'label' => false,
                                            'id' => 'seller-tel',
                                            'class' => 'form-control',
                                            'div' => false)); 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Owner IC No / Passport</label>
                                     <?= $this->Form->input('Store.seller_ic', array(
                                           'label' => false,
                                            'id' => 'seller-ic',
                                            'class' => 'form-control',
                                            'required'=>'',
                                            'div' => false)); 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Broker Name</label>
                                    <?= $this->Form->input('Store.broker_name', array(
                                           'label' => false,
                                            'id' => 'broker-name',
                                            'class' => 'form-control',
                                            'div' => false)); 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Broker Phone No.</label>
                                    <?= $this->Form->input('Store.broker_tel', array(
                                           'label' => false,
                                            'id' => 'broker-tel',
                                            'class' => 'form-control',
                                            'div' => false)); 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Broker Fee</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">RM</span>
                                        <?= $this->Form->input('Store.broker_fee', array(
                                           'label' => false,
                                            'id' => 'broker-fee',
                                            'class' => 'form-control',
                                            'div' => false)); 
                                    ?>
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                                
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-default">Submit Button</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>
                    </div>
                    </form>
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
