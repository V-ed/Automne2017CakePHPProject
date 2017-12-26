<div class="index columns content">
	
	<div id="about">
		
		<table>
			<tr>
				<?= $this->Html->image('logo.png', ['width' => '200']) ?>
			</tr>
			<tr>
				<th><?= __('The interest of this web application') ?></th>
				<td>Ce site est intéressant puisqu'il permet la mise en place d'une base de données utile aux utilisateurs de centres de polices, puisque gérer les éléments de preuves ainsi qu'attribuer les tâches des officiers est une étape ardue lorsqu'il n'y a pas protocol bien définit.</td>
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
				<td><?= $this->Html->image('my-schema.png', ['style' => 'max-height:300px']) ?></td>
			</tr>
			<tr>
				<th><?= __('Original database') ?></th>
				<td><?= $this->Html->link(__('Original schema'), 'http://www.databaseanswers.org/data_models/tracking_evidence/index.htm') ?></td>
			</tr>
			<tr>
				<th><?= __('Session and password changing') ?></th>
				<td>Malgré mes efforts pour comprendre le fonctionnement du démarrage par jetons à travers AngularJS, je n'ai pas réussi à faire cette étape. Ainsi, la connexion est toujours effectuée par CakePHP.</td>
			</tr>
			<tr>
				<th><?= __('Linked lists and AngularJS') ?></th>
				<td>
					<p>Les listes liées gérées par AngularJS se retrouvent dans l'ajout d'un Officier - chaque département contenant plusieurs rangs d'officiers.</p>
					<p>Fait intéressant : les éléments <code>&lt;select&gt;</code> et <code>&lt;option&gt;</code> sont en fait créés par le HTML helper de CakePHP, mais gérés par AngularJS. <?= $this->Html->link('Allez voir le code, c\'est assez intéressant et vous pourriez montrer ça aux futurs étudiants!', 'https://github.com/V-ed/Automne2017CakePHPProject/blob/80d0a3c81de020696e435cd336455d09015e1113/src/Template/Officers/add.ctp#L40') ?></p>
				</td>
			</tr>
			<tr>
				<th><?= __('CRUD and this application') ?></th>
				<td>
					<p>Les fonctions CRUD se retrouvent dans la page des Départements; il faudra vous connecter en tant qu'admin pour y accéder ([<i>admin</i>/<i>admin</i>], par exemple).</p>
					<p>
						Toutes les fonctions fonctionnent selon la méthode CRUD et cela sous n'importe quel ordre. De plus, lorsqu'un chargement est nécessaire, un icône de chargement apparaît et disparaît quand la page ne charge plus.
						<ol>
							<li>En tout temps, pour revenir à la page d'accueil des départements ou la rafraîchir, vous pouvez appuyer sur le boutton <strong><i><?= __('List Departments') ?></i></strong> dans les fonctions à gauche de la page.</li>
							<li>Ajouter un département se fait grâce au boutton <strong><i><?= __('New Department') ?></i></strong> dans les fonctions à gauche de la page.</li>
							<li>Visionner un département se fait en appuyant sur le boutton <strong><i><?= __('View') ?></i></strong> du département en question.</li>
							<li>Modifier un département se fait en appuyant sur le boutton <strong><i><?= __('Edit') ?></i></strong> du département en question.</li>
							<li>Supprimer un département se fait en appuyant sur le boutton <strong><i><?= __('Delete') ?></i></strong> du département en question.</li>
						</ol>
					</p>
				</td>
			</tr>
		</table>
		
	</div>
	
</div>
