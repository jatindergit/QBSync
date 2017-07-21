<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Create'), ['action' => 'create']) ?></li>
        <li><?= $this->Html->link(__('Read'), ['action' => 'read']) ?></li>
        <li><?= $this->Html->link(__('Update'), ['action' => 'update']) ?></li>
        <li><?= $this->Html->link(__('Query'), ['action' => 'query']) ?></li>
    </ul>
</nav>
<div class="configurations form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Create Credit Memo') ?></legend>
       
            <?= $this->Form->control('value',['type' => 'textarea','label' =>'Add json', 'required' => 'required']); ?>
   
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <div class="text-danger">
        <?php
        if(isset($error)){
                            echo "The Status code is: " . $error->getHttpStatusCode() . "<br>";
                            echo "The Helper message is: " . $error->getOAuthHelperError() . "<br>";
                            echo "The Response message is: " . $error->getResponseBody() . "<br>";
                        } 
        if(isset($resultingCreditMemoObj)) {
                            pr($resultingCreditMemoObj);
                        }

                    ?>
    </div>
</div>
