<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Orden> $orden
 */
?>
<div class="orden index content">
    <?= $this->Html->link(__('New Orden'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Orden') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('banco') ?></th>
                    <th><?= $this->Paginator->sort('destino') ?></th>
                    <th><?= $this->Paginator->sort('titular') ?></th>
                    <th><?= $this->Paginator->sort('monto') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('servicio') ?></th>
                    <th><?= $this->Paginator->sort('insumo_id') ?></th>
                    <th><?= $this->Paginator->sort('trabajador_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orden as $orden): ?>
                <tr>
                    <td><?= $this->Number->format($orden->id) ?></td>
                    <td><?= h($orden->tipo) ?></td>
                    <td><?= h($orden->banco) ?></td>
                    <td><?= $this->Number->format($orden->destino) ?></td>
                    <td><?= h($orden->titular) ?></td>
                    <td><?= $this->Number->format($orden->monto) ?></td>
                    <td><?= h($orden->fecha) ?></td>
                    <td><?= h($orden->status) ?></td>
                    <td><?= h($orden->servicio) ?></td>
                    <td><?= $orden->has('insumo') ? $this->Html->link($orden->insumo->id, ['controller' => 'Insumo', 'action' => 'view', $orden->insumo->id]) : '' ?></td>
                    <td><?= $orden->has('trabajadore') ? $this->Html->link($orden->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $orden->trabajadore->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $orden->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orden->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orden->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orden->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
