<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
        <h2 class="text-center">login</h2>
        <?= $this->Form->create(); ?>
        <?= $this->Form->control('email'); ?>
        <?= $this->Form->control('password', array('type' => 'password')); ?>
        <?= $this->Form->submit('login'); ?>
        <?= $this->Form->end(); ?>
        <?= $this->Html->link(__('Forgot Password'), ['action' => 'forgot'], ['class' => 'button float-right']) ?>

    </div>
</div>
<!-- <style>
    div.panel-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .panel {
        color: #3079ed;
        font-weight: bold;
        font-size: 3em;

        animation-name: focus-in-contract;
        animation-duration: 1.5s;
        animation-timing-function: linear;
        animation-delay: 0s;
        animation-iteration-count: 1;
        animation-direction: normal;
        animation-fill-mode: forwards;

        /* shorthand
		animation: focus-in-contract 2.2s linear 0s 1 normal forwards;*/
    }

    @keyframes focus-in-contract {

        0% {
            letter-spacing: 1em;
            filter: blur(10px);
            opacity: 0;
        }

        100% {
            filter: blur(0);
            opacity: 1;
        }
    }
</style> -->