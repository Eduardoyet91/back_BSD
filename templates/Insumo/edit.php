<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Insumo $insumo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $insumo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $insumo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Insumo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="insumo form content">
            <?= $this->Form->create($insumo) ?>
            <fieldset>
                <legend><?= __('Edit Insumo') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('cantidad');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
