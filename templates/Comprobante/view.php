<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comprobante $comprobante
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Comprobante'), ['action' => 'edit', $comprobante->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Comprobante'), ['action' => 'delete', $comprobante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comprobante->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Comprobante'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Comprobante'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="comprobante view content">
            <h3><?= h($comprobante->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Orden') ?></th>
                    <td><?= $comprobante->has('orden') ? $this->Html->link($comprobante->orden->id, ['controller' => 'Orden', 'action' => 'view', $comprobante->orden->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($comprobante->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($comprobante->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($comprobante->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
