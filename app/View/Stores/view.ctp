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
                    Pill Tabs
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#vehicle-info" data-toggle="tab">Vehicle Info</a>
                        </li>
                        <li><a href="#cost-info" data-toggle="tab">Cost Incurred</a>
                        </li>
                        <li><a href="#sales-info" data-toggle="tab">Sales Info</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="vehicle-info">
			                    <div class="panel-body">
			                        <div class="table-responsive">
			                            <table class="table table-striped table-bordered table-hover">
					                    	<tbody>
											  <tr>
											    <td width="15%" class="spec" scope="row">REGISTRATION NO&nbsp;</td>
											    <td width="35%" class="specrow"><?php echo h($store['Store']['reg_no']); ?></td>
											    <td width="15%" class="spec1">MODEL&nbsp;</td>
											    <td width="35%" class="specrow"><?php echo strtoupper($store['Make']['name']) . strtoupper($store['Mod']['name']) . " " . strtoupper($store['Store']['title']); ?></td>
											  </tr>
											  <tr>
											    <td class="specalt" scope="row">YEAR MADE&nbsp;</td>
											    <td class="alt"><?php echo $store['Store']['year_of_made']; ?></td>
											    <td class="specalt1">YEAR REGISTER&nbsp;</td>
											    <td class="alt"><?php echo $store['Store']['year_of_reg']; ?></td>
											  </tr>
											  <tr>
											    <td class="spec" scope="row">OWNER NAME</td>
											    <td class="specrow" colspan="3"><?php echo strtoupper($store['Store']['seller_name']); ?></td>
											  </tr>
											  <tr>
											    <td class="specalt" scope="row">OWNER PHONE NO&nbsp;</td>
											    <td class="alt"><?php echo $store['Store']['seller_tel']; ?></td>
											    <td class="specalt1">OWNER IC&nbsp;</td>
											    <td class="alt"><?php echo $store['Store']['seller_ic']; ?></td>
											  </tr>
											  <tr>
											    <td class="spec" scope="row">BROKER NAME</td>
											    <td class="specrow"><?php echo strtoupper($store['Store']['broker_name']); ?></td>
											    <td class="spec1">BROKER PHONE NO&nbsp;</td>
											    <td class="specrow"><?php echo $store['Store']['broker_tel']; ?></td>
											  </tr>
											  <tr>
											    <td class="specalt" scope="row">WALK-IN&nbsp;</td>
											    <td class="alt"><?php echo ($store['Store']['walk_in']) ? "YES" : "NO" ?></td>
											    <td class="specalt1">PRICE&nbsp;</td>
											    <td class="alt"><?php echo $this->Number->format($store['Store']['price'],array('places'=>2,'before'=>'MYR')); ?></td>
											  </tr>
											  <tr>
											    <td class="spec" scope="row">DATE PURCHASED&nbsp;</td>
											    <td class="specrow"><?php echo $this->Time->format( $format = 'd-m-Y', $store['Store']['date']); ?></td>
											    <?php
											      $role = $this->Session->read('Auth.User.role');
											      if($role == 9999) : 
											        $pnl = $sale['Sale']['price'] - ($store['Store']['price'] + $purchaseCostsAmt[0]['total_sum']) ;
											        $formatedPnL = $this->Number->format($pnl,array('places'=>2,'before'=>'MYR'));
											      endif;
											     ?>
											    
											    <td class="spec1"><?php echo ($role == 9999)?"PROFIT & LOSS" : ""?></td>
											    <td class="specrow"><?php echo ($role == 9999)?$formatedPnL : ""?></td>
											  </tr>
											  <tr>
											    <td class="specalt" scope="row">DESCRIPTION&nbsp;</td>
											    <td class="alt" colspan="3"><?php echo $store['Store']['remarks']; ?></td>
											  </tr>
											  <tr>
											    <td class="spec" scope="row">REMARKS&nbsp;</td>
											    <td class="specrow" colspan="3">
										    		<?php 
														if($store['Document']['Document']['incomplete'] != null) :?>
														<span class="red">DOCUMENT IS NOT COMPLETED</span>
														<br />
														<div id="list5">
														 <ol>
														<?php 
														foreach($store['Document']['Document']['incomplete'] as $doc):
														?>
														      <li><p><em><?php echo $doc;?></em></li>
														<?php endforeach;?>
														 </ol>
														 </div>
														<?php else:?>
														DOCUMENT IS COMPLETE
													<?php endif;?>
												</td>
											  </tr>
											</tbody>
					                    </table>
			                        </div>
			                            <!-- /.table-responsive -->
			                    </div>
			                    <!-- Nav tabs -->
                <!-- /.panel-body -->
                        </div>
                        <div class="tab-pane fade" id="cost-info">
			                    <div class="panel-body">
			                        <div class="col-lg-12">
					                    <div class="panel panel-default">
					                        <div class="panel-heading">
					                            Administrative Cost
					                        </div>
					                        <div class="panel-body">
					                            <div class="table-responsive">
			                            			<table class="table table-striped table-bordered">
					                    				<tbody>
											  				<tr>
											  					<th>Items</th>
											  					<th>Receipt No</th>
											  					<th>Amount (RM)</th>
											  					<th>Actions</th>
											  				</tr>
											  				<?php
											  					$amount = 0;
											  					$costRepair = array();
											  					foreach($purchaseCosts as $cost) :
											  						if($cost['Lookup']['category'] == "REPAIR") :
											  							array_push($costRepair, $cost);
											  						else :
											  							$amount += $cost['PurchaseCost']['amount'];
											  				?>
											  				<tr>
											  					<td><?=strtoupper($cost['Lookup']['value'])?>
											  					<?php echo ($cost['PurchaseCost']['remarks'] == "") ? "" : "- ".$cost['PurchaseCost']['remarks'] ?></td>
											  					<td><?=$cost['PurchaseCost']['receipt_no']?></td>
											  					<td><?=$this->Number->format($cost['PurchaseCost']['amount'],array('places'=>2,'before'=>"")); ?></td>
											  					<td>
                                									<?php echo $this->Html->link(__('', true), array('controller'=>'PurchaseCosts','action' => 'edit', $cost['PurchaseCost']['id']),array('class'=>'glyphicon glyphicon-edit')); ?>
																	<?php echo $this->Html->link(__('', true), array('controller'=>'PurchaseCosts','action' => 'delete', $store['Store']['id']),array('class'=>'glyphicon glyphicon-remove'), sprintf(__('Are you sure you want to delete # %s?', true), $cost['PurchaseCost']['id'])); ?>
									                            </td>
											  				</tr>
											  			<?php 
											  				endif;
											  				endforeach; 
											  			?>
														</tbody>
								                    </table>
						                        </div>
					                        </div>
					                        <div class="panel-footer text-right">
					                           <strong>Total Amount (RM) : <?=$this->Number->format($amount,array('places'=>2,'before'=>""));?></strong>
					                        </div>
					                    </div>
					                </div>
					                <div class="col-lg-12">
					                    <div class="panel panel-default">
					                        <div class="panel-heading">
					                            Repair Cost
					                        </div>
					                        <div class="panel-body">
					                            <div class="table-responsive">
			                            			<table class="table table-striped table-bordered">
					                    				<tbody>
											  				<tr>
											  					<th>Items</th>
											  					<th>Receipt No</th>
											  					<th>Amount (RM)</th>
											  					<th>Actions</th>
											  				</tr>
											  				<?php 
												  				$amount = 0;
												  				foreach($costRepair as $repair) : 
												  					$amount += $repair['PurchaseCost']['amount'];
											  				?>
											  				<tr>
											  					<td><?=strtoupper($repair['Lookup']['value'])?>
											  					<?php echo ($repair['PurchaseCost']['remarks'] == "") ? "" : "- ".$repair['PurchaseCost']['remarks'] ?></td>
											  					<td><?=$repair['PurchaseCost']['receipt_no']?></td>
											  					<td><?=$this->Number->format($repair['PurchaseCost']['amount'],array('places'=>2,'before'=>"")); ?></td>
											  					<td>
												  					<?php echo $this->Html->link(__('', true), array('controller'=>'PurchaseCosts','action' => 'edit', $repair['PurchaseCost']['id']),array('class'=>'glyphicon glyphicon-edit')); ?>
																	<?php echo $this->Html->link(__('', true), array('controller'=>'PurchaseCosts','action' => 'delete', $store['Store']['id']),array('class'=>'glyphicon glyphicon-remove'), sprintf(__('Are you sure you want to delete # %s?', true), $repair['PurchaseCost']['id'])); ?>
				                            				 	</td>
											  				</tr>
											  				<?php endforeach;?>
														</tbody>
								                    </table>
						                        </div>
					                        </div>
					                        <div class="panel-footer  text-right">
					                           <strong>Total Amount (RM) : <?=$this->Number->format($amount,array('places'=>2,'before'=>""));?></strong>
					                        </div>
					                    </div>
					                </div>
			                    </div>
			                    <!-- Nav tabs -->
                <!-- /.panel-body -->
                        </div>
                         <div class="tab-pane fade" id="sales-info">
			                    <div class="panel-body">
			                        <div class="table-responsive">
			                            <table class="table table-striped table-bordered table-hover">
					                    	<tbody>
											  <tr>
											    <td width="15%" class="spec" scope="row">SELLING PRICE</td>
											    <td width="35%" class="specrow"><?php echo $this->Number->format($sale['Sale']['price'],array('places'=>2,'before'=>'MYR')); ?></td>
											    <td width="15%" class="spec1">BUYER NAME</td>
											    <td width="35%" class="specrow"><?php echo strtoupper($sale['Sale']['buyer_name']); ?></td>
											  </tr>
											  <tr>
											    <td class="specalt" scope="row">DELIVERED DATE</td>
											    <td class="alt"><?php echo $this->Time->format("d-m-Y h:m:s",$sale['Sale']['deliver_date']); ?></td>
											    <td class="specalt1">BUYER CONTACT NO</td>
											    <td class="alt"><?php echo $sale['Sale']['buyer_tel']; ?></td>
											  </tr>
											  <tr>
											    <td class="spec" scope="row">BUYER IC</td>
											    <td class="specrow" colspan="3"><?php echo $sale['Sale']['buyer_ic']; ?></td>
											  </tr>
											  <tr>
											    <td class="specalt" scope="row">BROKER NAME</td>
											    <td class="alt"><?php echo  strtoupper($sale['Sale']['broker_name']); ?></td>
											    <td class="specalt1">BROKER CONTACT NO</td>
											    <td class="alt"><?php echo $sale['Sale']['broker_tel']; ?></td>
											  </tr>
											  <tr>
											    <td class="spec" scope="row">SALES TYPE</td>
											    <td class="specrow"><?php echo $sale['Salestype']['name']; ?></td>
											    <td class="spec1">INSURANCE</td>
											    <td class="specrow"><?php echo $sale['Sale']['insurance']; ?></td>
											  </tr>
											  <tr>
											    <td class="specalt" scope="row">REMARKS&nbsp;</td>
											    <td class="alt" colspan="3"><?php echo $sale['Sale']['remarks']; ?>&nbsp;</td>
											  </tr>
											</tbody>
					                    </table>
			                        </div>
			                            <!-- /.table-responsive -->
			                    </div>
			                    <!-- Nav tabs -->
                <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
                        <!-- /.panel-body -->

            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->



