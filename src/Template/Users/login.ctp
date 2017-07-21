<?php ?>
<div class="login-box">
    <!-- login form -->
        <?= $this->Form->create('',['class'=>'sky-form boxed']) ?>
    <header><i class="fa fa-users"></i> Sign In</header>
        <?= $this->Flash->render() ?>
    <fieldset>	
        <section>
            <label class="label">E-mail</label>
            <label class="input">
                <i class="icon-append fa fa-envelope"></i>
                    <?= $this->Form->control('email',['label' => false]) ?>
                <span class="tooltip tooltip-top-right">Email Address</span>
            </label>
        </section>
        <section>
            <label class="label">Password</label>
            <label class="input">
                <i class="icon-append fa fa-lock"></i>
                    <?= $this->Form->control('password',['label' => false]) ?>
                <b class="tooltip tooltip-top-right">Type your Password</b>
            </label>
            <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked><i></i>Keep me logged in</label>
        </section>
    </fieldset>
    <footer>
            <?= $this->Form->button(__('Login'),['class' => 'btn btn-primary pull-right']); ?>
        <div class="forgot-password pull-left">
            <a href="page-password.html">Forgot password?</a> <br />
            <a href="page-register.html"><b>Need to Register?</b></a>
        </div>
    </footer>
    <?= $this->Form->end() ?>
    <!-- /login form -->
</div>