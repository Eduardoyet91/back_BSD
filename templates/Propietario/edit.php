<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propietario $propietario
 * @var string[]|\Cake\Collection\CollectionInterface $persona
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propietario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propietario->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Propietario'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propietario form content">
            <?= $this->Form->create($propietario) ?>
            <fieldset>
                <legend><?= __('Edit Propietario') ?></legend>
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
