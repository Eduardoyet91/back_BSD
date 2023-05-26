<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orden $orden
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Orden'), ['action' => 'edit', $orden->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Orden'), ['action' => 'delete', $orden->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orden->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orden'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Orden'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orden view content">
            <h3><?= h($orden->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($orden->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Banco') ?></th>
                    <td><?= h($orden->banco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Titular') ?></th>
                    <td><?= h($orden->titular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($orden->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Servicio') ?></th>
                    <td><?= h($orden->servicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Insumo') ?></th>
                    <td><?= $orden->has('insumo') ? $this->Html->link($orden->insumo->id, ['controller' => 'Insumo', 'action' => 'view', $orden->insumo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Trabajadore') ?></th>
                    <td><?= $orden->has('trabajadore') ? $this->Html->link($orden->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $orden->trabajadore->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($orden->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Destino') ?></th>
                    <td><?= $this->Number->format($orden->destino) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monto') ?></th>
                    <td><?= $this->Number->format($orden->monto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($orden->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
