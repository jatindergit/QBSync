<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Configuration[]|\Cake\Collection\CollectionInterface $configurations
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
<div class="configurations index large-9 medium-8 columns content">
    <h3><?= __('Credit Memos') ?></h3>
    <?php if(isset($creditMemos)){ ?>
        <div>
            <?php pr($creditMemos);?>
        </div>
    <?php } ?>
        
</div>
