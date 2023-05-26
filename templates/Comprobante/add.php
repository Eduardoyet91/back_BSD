<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comprobante $comprobante
 * @var \Cake\Collection\CollectionInterface|string[] $orden
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Comprobante'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="comprobante form content">
            <?= $this->Form->create($comprobante) ?>
            <fieldset>
                <legend><?= __('Add Comprobante') ?></legend>
                <?php
                    echo $this->Form->control('orden_id', ['options' => $orden]);
                    echo $this->Form->control('fecha', ['empty' => true]);
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
