<?php
?>
    <?php if ($this->beginCache('user_list', ['duration' => 30])): ?>
        <div>
        <?= print_r($users) ?>
        </div>
    <?php $this->endCache();endif; ?>

<div>
    <?= print_r($activities) ?>
</div>

