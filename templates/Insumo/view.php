<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Insumo $insumo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Insumo'), ['action' => 'edit', $insumo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Insumo'), ['action' => 'delete', $insumo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $insumo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Insumo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Insumo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="insumo view content">
            <h3><?= h($insumo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($insumo->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($insumo->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($insumo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $insumo->cantidad === null ? '' : $this->Number->format($insumo->cantidad) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
