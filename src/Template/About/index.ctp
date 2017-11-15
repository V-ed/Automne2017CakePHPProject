<div class="index columns content">
	
	<div id="about">
		
		<p><?= $this->Html->image('logo.png', ['width' => '200']) ?></p>
		
		<p><?= __('My name : {0}', 'Guillaume Marcoux') ?></p>
		<p><?= __('Class title : {0}', '420-267 MO Développer un site Web et une application pour Internet') ?></p>
		<p>
			<?= __('Description :') ?>
			
		</p>
		<p><?php echo __('My database :'); echo $this->Html->image('my-schema.png', ['height' => '300']) ?></p>
		<p><?php echo __('Original database : {0}', $this->Html->link(__('Original schema'), 'http://www.databaseanswers.org/data_models/tracking_evidence/index.htm')) ?></p>
		
	</div>
	
</div>
