<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orden $orden
 * @var string[]|\Cake\Collection\CollectionInterface $insumo
 * @var string[]|\Cake\Collection\CollectionInterface $trabajadores
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orden->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orden->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Orden'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orden form content">
            <?= $this->Form->create($orden) ?>
            <fieldset>
                <legend><?= __('Edit Orden') ?></legend>
                <?php
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('banco');
                    echo $this->Form->control('destino');
                    echo $this->Form->control('titular');
                    echo $this->Form->control('monto');
                    echo $this->Form->control('fecha', ['empty' => true]);
                    echo $this->Form->control('status');
                    echo $this->Form->control('servicio');
                    echo $this->Form->control('insumo_id', ['options' => $insumo, 'empty' => true]);
                    echo $this->Form->control('trabajador_id', ['options' => $trabajadores, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
