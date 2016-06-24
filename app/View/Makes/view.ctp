<div class="makes view">
<h2><?php echo __('Make'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($make['Make']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($make['Make']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Make'), array('action' => 'edit', $make['Make']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Make'), array('action' => 'delete', $make['Make']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $make['Make']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Makes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Make'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mods'), array('controller' => 'mods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mod'), array('controller' => 'mods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Mods'); ?></h3>
	<?php if (!empty($make['Mod'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Make Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Trans'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($make['Mod'] as $mod): ?>
		<tr>
			<td><?php echo $mod['id']; ?></td>
			<td><?php echo $mod['make_id']; ?></td>
			<td><?php echo $mod['name']; ?></td>
			<td><?php echo $mod['trans']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'mods', 'action' => 'view', $mod['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'mods', 'action' => 'edit', $mod['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'mods', 'action' => 'delete', $mod['id']), array('confirm' => __('Are you sure you want to delete # %s?', $mod['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Mod'), array('controller' => 'mods', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Stores'); ?></h3>
	<?php if (!empty($make['Store'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Reg No'); ?></th>
		<th><?php echo __('Make Id'); ?></th>
		<th><?php echo __('Mod Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Manufacture Id'); ?></th>
		<th><?php echo __('Year Of Made'); ?></th>
		<th><?php echo __('Year Of Reg'); ?></th>
		<th><?php echo __('Seller Name'); ?></th>
		<th><?php echo __('Seller Tel'); ?></th>
		<th><?php echo __('Seller Ic'); ?></th>
		<th><?php echo __('Broker Name'); ?></th>
		<th><?php echo __('Broker Tel'); ?></th>
		<th><?php echo __('Walk In'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Remarks'); ?></th>
		<th><?php echo __('In Store'); ?></th>
		<th><?php echo __('Under Finance'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($make['Store'] as $store): ?>
		<tr>
			<td><?php echo $store['id']; ?></td>
			<td><?php echo $store['reg_no']; ?></td>
			<td><?php echo $store['make_id']; ?></td>
			<td><?php echo $store['mod_id']; ?></td>
			<td><?php echo $store['title']; ?></td>
			<td><?php echo $store['manufacture_id']; ?></td>
			<td><?php echo $store['year_of_made']; ?></td>
			<td><?php echo $store['year_of_reg']; ?></td>
			<td><?php echo $store['seller_name']; ?></td>
			<td><?php echo $store['seller_tel']; ?></td>
			<td><?php echo $store['seller_ic']; ?></td>
			<td><?php echo $store['broker_name']; ?></td>
			<td><?php echo $store['broker_tel']; ?></td>
			<td><?php echo $store['walk_in']; ?></td>
			<td><?php echo $store['price']; ?></td>
			<td><?php echo $store['date']; ?></td>
			<td><?php echo $store['image']; ?></td>
			<td><?php echo $store['remarks']; ?></td>
			<td><?php echo $store['in_store']; ?></td>
			<td><?php echo $store['under_finance']; ?></td>
			<td><?php echo $store['created']; ?></td>
			<td><?php echo $store['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stores', 'action' => 'view', $store['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stores', 'action' => 'edit', $store['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stores', 'action' => 'delete', $store['id']), array('confirm' => __('Are you sure you want to delete # %s?', $store['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
