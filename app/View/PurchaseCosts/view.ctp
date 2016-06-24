<div class="purchaseCosts view">
<h2><?php echo __('Purchase Cost'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchaseCost['PurchaseCost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseCost['Store']['reg_no'], array('controller' => 'stores', 'action' => 'view', $purchaseCost['Store']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lookup'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseCost['Lookup']['value'], array('controller' => 'lookups', 'action' => 'view', $purchaseCost['Lookup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($purchaseCost['PurchaseCost']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks'); ?></dt>
		<dd>
			<?php echo h($purchaseCost['PurchaseCost']['remarks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Receipt No'); ?></dt>
		<dd>
			<?php echo h($purchaseCost['PurchaseCost']['receipt_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($purchaseCost['PurchaseCost']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($purchaseCost['PurchaseCost']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase Cost'), array('action' => 'edit', $purchaseCost['PurchaseCost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchase Cost'), array('action' => 'delete', $purchaseCost['PurchaseCost']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseCost['PurchaseCost']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Costs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Cost'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lookups'), array('controller' => 'lookups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lookup'), array('controller' => 'lookups', 'action' => 'add')); ?> </li>
	</ul>
</div>
