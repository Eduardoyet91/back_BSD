<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propietario $propietario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Propietario'), ['action' => 'edit', $propietario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Propietario'), ['action' => 'delete', $propietario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propietario->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Propietario'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Propietario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="propietario view content">
            <h3><?= h($propietario->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Persona') ?></th>
                    <td><?= $propietario->has('persona') ? $this->Html->link($propietario->persona->id, ['controller' => 'Persona', 'action' => 'view', $propietario->persona->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Edificio') ?></th>
                    <td><?= h($propietario->edificio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apartamento') ?></th>
                    <td><?= h($propietario->apartamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($propietario->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
