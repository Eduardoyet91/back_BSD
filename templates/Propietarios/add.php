<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propietario $propietario
 * @var \Cake\Collection\CollectionInterface|string[] $persona
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Propietarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propietarios form content">
            <?= $this->Form->create($propietario) ?>
            <fieldset>
                <legend><?= __('Add Propietario') ?></legend>
                <?php
                    echo $this->Form->control('persona_id', ['options' => $persona]);
                    echo $this->Form->control('edificio');
                    echo $this->Form->control('apartamento');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
