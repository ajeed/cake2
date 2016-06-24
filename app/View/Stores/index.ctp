<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">List of Available</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<!-- Remove this first 
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Filter
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $this->Form->create('Store',array('type' => 'get','class'=>'form-horizontal','role'=>'form')); ?>
						<div class="form-group row ">
			                <label for="inputKey" class="col-md-2 control-label">Purchase Date:</label>
			                <div class='col-md-2'>
						        <div class="form-group">
						            <div class='input-group date' id='datetimepicker6'>
						                <input type='text' class="form-control" name="pdtFrom" value="<?=$data['pdtFrom']?>"/>
						                <span class="input-group-addon">
						                    <span class="glyphicon glyphicon-calendar"></span>
						                </span>
						            </div>
						        </div>
						    </div>
						    <label for="datetimepicker7" class="col-md-1 control-label">To</label>
						    <div class='col-md-2'>
						        <div class="form-group">
						            <div class='input-group date' id='datetimepicker7'>
						                <input type='text' class="form-control"  name="pdtTo"  value="<?=$data['pdtTo']?>"/>
						                <span class="input-group-addon">
						                    <span class="glyphicon glyphicon-calendar"></span>
						                </span>
						            </div>
						        </div>
						    </div>
		            	</div>
		            	<div class="form-group row ">
		            		<label class="col-md-2 control-label" for="pwd">Vehicle Status:</label>
		            		<div class='col-md-2'>
		            			<div class="form-group">
		            				<select class="form-control" name="status">
		                                <option value='3' <?=(($this->request->query['status'] == 3)||empty($this->request->query['status']))?'selected':''?>>ALL</option>
		                                <option value='0' <?=($this->request->query['status'] == 0)?'selected':''?>>SOLD</option>
		                                <option value='1' <?=(($this->request->query['status'] == 1) || (empty($this->request->query['status']))) ? 'selected':'' ?>>AVAILABLE</option>
		                            </select>
		            			</div>
		            		</div>
		            	</div>
					    <div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-10">
						      <div class="checkbox">
						        <label><input type="checkbox" name="incompleteDoc" <?=($this->request->query['incompleteDoc'] === 'on') ? 'checked' : '' ?>> Incomplete Document</label>
						      </div>
						    </div>
					    </div>
					    <div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-10">
						      <div class="checkbox">
						        <label><input type="checkbox" name="underFinance" <?=($this->request->query['underFinance'] === 'on') ? 'checked' : '' ?>> Under Finance</label>
						      </div>
						    </div>
					    </div>
					    <div class="form-group"> 
					    	<div class="col-sm-offset-2 col-sm-10">
					      	<button type="submit" class="btn btn-default">Filter</button>
					    </div>
					  </div>
					</form>
					<script type="text/javascript">
						    $(function () {
						        $('#datetimepicker6').datetimepicker({
						        	format:"DD/MM/YYYY"
						        });
						        $('#datetimepicker7').datetimepicker({
						            useCurrent: false, //Important! See issue #1075
						            format:"DD/MM/YYYY"
						        });
						        $("#datetimepicker6").on("dp.change", function (e) {
						            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
						        });
						        $("#datetimepicker7").on("dp.change", function (e) {
						            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
						        });
						    });
						</script>
                </div>
            </div>
        </div>
    </div>
</div>
-->
</div>
<div class="row">
    <div class="col-lg-12">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Plate #</th>
                                <th>Title</th>
                                <th>Year</th>
                                <th>Purchase Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$number = 0;
                        		pr($underFinance);
                        		foreach ($stores as $store): 
                        			$number++;
                        			$class = ($number % 2 == 0)?"even":"odd";
                        	?>
                            <tr class="<?=$class?>">
                                <td><?=$this->Html->link($store['Store']['reg_no'],array('action'=>'view',$store['Store']['id'])); ?></td>
                                <td><?=strtoupper($store['Make']['name'] ." ".$store['Mod']['name']." ".$store['Store']['title'])?></td>
                                <td><?=$store['Store']['year']; ?></td>
                                <td><?=$this->Time->format($store['Store']['date'], '%d-%m-%Y');?></td>
                                <td>
                                	<ul class="list-unstyled">
									  <?=(in_array($store['Store']['id'],$pendingDocs)) ? '<li><span class="label label-danger label-important">Incomplete Documents</span></li>' : ''; ?>
									  <?=(in_array($store['Store']['id'],$underFinance)) ? '<li><span class="label label-warning label-important">Under Finance</span></li>' : ''; ?>
									</ul>
                                </td>
                                <td>
                                	<?php if($store['Store']['in_store']) :?>
									<?php echo $this->Html->link(__('', true), array('controller'=>'sales','action' => 'process', $store['Store']['id']),array('class'=>'glyphicon glyphicon-search')); ?>
									<?php endif;?>
									<?php echo $this->Html->link(__('', true), array('action' => 'edit', $store['Store']['id']),array('class'=>'glyphicon glyphicon-edit')); ?>
									<?php echo $this->Html->link(__('', true), array('action' => 'delete', $store['Store']['id']),array('class'=>'glyphicon glyphicon-remove'), sprintf(__('Are you sure you want to delete # %s?', true), $store['Store']['reg_no'])); ?>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                	<div class="col-sm-6">
                		<div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">
                			<?php
								echo $this->Paginator->counter(array(
									'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total.')
								));
							?>
                		</div>
                	</div>
                	<?php

//echo $this->Paginator->numbers(array('separator' => ''));
//echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
                	<div class="col-sm-6">
                		<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                			<ul class="pagination">
                				<li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
            					<?php
            						echo $this->Paginator->prev(__('Previous'), array(
            							'tag'=>'li',
            							'class'=>'paginate_button previous'), null,array(
            							'class'=>'paginate_button previous disabled',
            							'tag'=>'a'));
            					?>
                				
                				<?php
                				 echo $this->Paginator->numbers(array(
                				 	'separator' => '',
                				 	'tag'=>'li',
                				 	'class'=>'paginate_button',
                				 	'currentClass'=>'paginate_button active',
                				 	'currentTag'=>'a'));
                				?>
                				<li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a></li>
                			</ul>
                		</div>
                	</div>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="stores index">
	<h2><?php echo __('Stores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('reg_no'); ?></th>
			<th><?php echo $this->Paginator->sort('make_id'); ?></th>
			<th><?php echo $this->Paginator->sort('mod_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacture_id'); ?></th>
			<th><?php echo $this->Paginator->sort('year_of_made'); ?></th>
			<th><?php echo $this->Paginator->sort('year_of_reg'); ?></th>
			<th><?php echo $this->Paginator->sort('seller_name'); ?></th>
			<th><?php echo $this->Paginator->sort('seller_tel'); ?></th>
			<th><?php echo $this->Paginator->sort('seller_ic'); ?></th>
			<th><?php echo $this->Paginator->sort('broker_name'); ?></th>
			<th><?php echo $this->Paginator->sort('broker_tel'); ?></th>
			<th><?php echo $this->Paginator->sort('walk_in'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('remarks'); ?></th>
			<th><?php echo $this->Paginator->sort('in_store'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($stores as $store): ?>
	<tr>
		<td><?php echo h($store['Store']['id']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['reg_no']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($store['Make']['name'], array('controller' => 'makes', 'action' => 'view', $store['Make']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($store['Mod']['name'], array('controller' => 'mods', 'action' => 'view', $store['Mod']['id'])); ?>
		</td>
		<td><?php echo h($store['Store']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($store['Manufacture']['id'], array('controller' => 'manufactures', 'action' => 'view', $store['Manufacture']['id'])); ?>
		</td>
		<td><?php echo h($store['Store']['year_of_made']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['year_of_reg']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['seller_name']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['seller_tel']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['seller_ic']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['broker_name']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['broker_tel']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['walk_in']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['price']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['date']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['image']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['remarks']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['in_store']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['created']); ?>&nbsp;</td>
		<td><?php echo h($store['Store']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $store['Store']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $store['Store']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $store['Store']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $store['Store']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Store'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Makes'), array('controller' => 'makes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Make'), array('controller' => 'makes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mods'), array('controller' => 'mods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mod'), array('controller' => 'mods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufactures'), array('controller' => 'manufactures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacture'), array('controller' => 'manufactures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Costs'), array('controller' => 'purchase_costs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Cost'), array('controller' => 'purchase_costs', 'action' => 'add')); ?> </li>
	</ul>
</div>
