<div class="stores form">
<?php echo $this->Form->create('Store'); ?>
	<fieldset>
		<legend><?php echo __('Edit Store'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('reg_no');
		echo $this->Form->input('make_id');
		echo $this->Form->input('mod_id');
		echo $this->Form->input('title');
		echo $this->Form->input('manufacture_id');
		echo $this->Form->input('year_of_made');
		echo $this->Form->input('year_of_reg');
		echo $this->Form->input('seller_name');
		echo $this->Form->input('seller_tel');
		echo $this->Form->input('seller_ic');
		echo $this->Form->input('broker_name');
		echo $this->Form->input('broker_tel');
		echo $this->Form->input('walk_in');
		echo $this->Form->input('price');
		echo $this->Form->input('date');
		echo $this->Form->input('image');
		echo $this->Form->input('remarks');
		echo $this->Form->input('in_store');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Store.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Store.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?></li>
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
