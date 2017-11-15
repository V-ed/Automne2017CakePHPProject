<div class="index columns content">
	
	<div id="about">
		
		<table>
			<tr>
				<?= $this->Html->image('logo.png', ['width' => '200']) ?>
			</tr>
			<tr>
				<th><?= __('My name') ?></th>
				<td>Guillaume Marcoux</td>
			</tr>
			<tr>
				<th><?= __('Class title') ?></th>
				<td>
					420-267 MO Développer un site Web et une application pour Internet
					<br>
					Automne 2017, Collège Montmorency
				</td>
			</tr>
			<tr>
				<th><?= __('My database') ?></th>
				<td><?= $this->Html->image('my-schema.png') ?></td>
			</tr>
			<tr>
				<th><?= __('Original database') ?></th>
				<td><?= $this->Html->link(__('Original schema'), 'http://www.databaseanswers.org/data_models/tracking_evidence/index.htm') ?></td>
			</tr>
		</table>
		
	</div>
	
</div>
