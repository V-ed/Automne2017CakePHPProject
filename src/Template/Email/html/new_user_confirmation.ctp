<p><?= __('Thank you for registering to {0}, {1}!', $company, $user->full_name) ?></p>

<?php

$confirmLink = $this->Html->link(__('activate your account!'), ['controller' => 'Users', 'action' => 'confirm', $user->confirmation->uuid, '_full' => true]);

$textBody = __('To complete your account activation, please click on the following link : {0}', $confirmLink);

?>
<p><?= $textBody ?></p>

<p><?= __('Thank you again for registering to our website and we hope you\'ll have a nice stay!') ?></p>
