<div class="purchaseCosts form">
<?php echo $this->Form->create('PurchaseCost'); ?>
	<fieldset>
		<legend><?php echo __('Add Purchase Cost'); ?></legend>
	<?php
		echo $this->Form->input('store_id');
		echo $this->Form->input('lookup_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('remarks');
		echo $this->Form->input('receipt_no');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Purchase Costs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lookups'), array('controller' => 'lookups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lookup'), array('controller' => 'lookups', 'action' => 'add')); ?> </li>
	</ul>
</div>
