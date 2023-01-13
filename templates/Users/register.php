<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
        <h2 class="text-center">Registration Form</h2>
        <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']); ?>
        <?= $this->Form->control('name', ['required' => false]); ?>
        <?= $this->Form->control('phone', ['required' => false]); ?>
        <?= $this->Form->control('email', ['required' => false]); ?>
        <?= $this->Form->control('password', array('type' => 'password', 'required' => false)); ?>
        <?= $this->Form->control('file', ['type' => 'file']); ?>
        <?= $this->Form->control('gender', array('type' => 'radio', 'required' => false)); ?>
        <?= $this->Form->radio('gender', ['Male' => 'Male', 'Female' => 'Female']); ?>
        <?= $this->Form->submit('Register', array('class' => 'button')); ?>
        <?= $this->Form->end(); ?>

    </div>
</div>