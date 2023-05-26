<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ficha $ficha
 * @var \Cake\Collection\CollectionInterface|string[] $trabajadores
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ficha'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ficha form content">
            <?= $this->Form->create($ficha) ?>
            <fieldset>
                <legend><?= __('Add Ficha') ?></legend>
                <?php
                    echo $this->Form->control('trabajador_id', ['options' => $trabajadores]);
                    echo $this->Form->control('turno');
                    echo $this->Form->control('entrada', ['empty' => true]);
                    echo $this->Form->control('salida', ['empty' => true]);
                    echo $this->Form->control('fecha');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
