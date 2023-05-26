<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trabajadore $trabajadore
 * @var \Cake\Collection\CollectionInterface|string[] $persona
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Trabajadores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trabajadores form content">
            <?= $this->Form->create($trabajadore) ?>
            <fieldset>
                <legend><?= __('Add Trabajadore') ?></legend>
                <?php
                    echo $this->Form->control('persona_id', ['options' => $persona]);
                    echo $this->Form->control('nom_banc');
                    echo $this->Form->control('num_cuen');
                    echo $this->Form->control('departamento');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
