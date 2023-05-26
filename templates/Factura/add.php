<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura $factura
 * @var \Cake\Collection\CollectionInterface|string[] $propietarios
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Factura'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="factura form content">
            <?= $this->Form->create($factura) ?>
            <fieldset>
                <legend><?= __('Add Factura') ?></legend>
                <?php
                    echo $this->Form->control('propietario_id', ['options' => $propietarios]);
                    echo $this->Form->control('fecha', ['empty' => true]);
                    echo $this->Form->control('monto');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
