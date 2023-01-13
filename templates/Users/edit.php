<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?= $this->Html->image(($user->file), array('width' => '200px')) ?>
                <?php

                echo $this->Form->control('file', ['type' => 'file', 'required' => false]);
                echo $this->Form->control('name');
                echo $this->Form->control('phone');
                echo $this->Form->control('email');
                echo $this->Form->control('gender', array('type' => 'radio'));
                echo $this->Form->radio('gender', ['Male' => 'Male', 'Female' => 'Female'], ['required' => false]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'submit']) ?>
            <?= $this->Html->link(__('Go Back'), ['action' => 'index'], ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>