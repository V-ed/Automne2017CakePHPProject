<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="users view large-10 medium-8 columns content">
		<h3><?= h($user->full_name) ?></h3>
		<table class="vertical-table">
			<?php if($loggedUser != null && $loggedUser->is_admin) : ?>
				<tr>
					<th scope="row"><?= __('Is Admin') ?></th>
					<td><?= $user->is_admin ? __('Yes') : __('No'); ?></td>
				</tr>
			<?php endif; ?>
			<tr>
				<th scope="row"><?= __('First Name') ?></th>
				<td><?= h($user->first_name) ?></td>
			</tr>
			<tr>
				<th scope="row"><?= __('Last Name') ?></th>
				<td><?= h($user->last_name) ?></td>
			</tr>
			<tr>
				<th scope="row"><?= __('Username') ?></th>
				<td><?= h($user->username) ?></td>
			</tr>
			<tr>
				<th scope="row"><?= __('Joined On') ?></th>
				<td><?= h($user->created) ?></td>
			</tr>
		</table>
	</div>

</body>
</html>


