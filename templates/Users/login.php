<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
        <h2 class="text-center">login</h2>
        <?= $this->Form->create(); ?>
        <?= $this->Form->control('email'); ?>
        <?= $this->Form->control('password', array('type' => 'password')); ?>
        <?= $this->Form->button('login'); ?>
        <?= $this->Form->end(); ?>
        <?= $this->Html->link(__('Forgot Password'), ['action' => 'forgot'], ['class' => 'button float-right']) ?>

    </div>
</div>