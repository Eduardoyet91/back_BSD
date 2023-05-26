<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Comprobante> $comprobante
 */
?>
<div class="comprobante index content">
    <?= $this->Html->link(__('New Comprobante'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Comprobante') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('orden_id') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comprobante as $comprobante): ?>
                <tr>
                    <td><?= $this->Number->format($comprobante->id) ?></td>
                    <td><?= $comprobante->has('orden') ? $this->Html->link($comprobante->orden->id, ['controller' => 'Orden', 'action' => 'view', $comprobante->orden->id]) : '' ?></td>
                    <td><?= h($comprobante->fecha) ?></td>
                    <td><?= h($comprobante->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $comprobante->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comprobante->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comprobante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comprobante->id)]) ?>
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
