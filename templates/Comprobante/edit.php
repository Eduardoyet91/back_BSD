<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comprobante $comprobante
 * @var string[]|\Cake\Collection\CollectionInterface $orden
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comprobante->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comprobante->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Comprobante'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="comprobante form content">
            <?= $this->Form->create($comprobante) ?>
            <fieldset>
                <legend><?= __('Edit Comprobante') ?></legend>
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
