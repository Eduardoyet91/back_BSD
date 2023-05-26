<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Insumo> $insumo
 */
?>
<div class="insumo index content">
    <?= $this->Html->link(__('New Insumo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Insumo') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($insumo as $insumo): ?>
                <tr>
                    <td><?= $this->Number->format($insumo->id) ?></td>
                    <td><?= h($insumo->nombre) ?></td>
                    <td><?= $insumo->cantidad === null ? '' : $this->Number->format($insumo->cantidad) ?></td>
                    <td><?= h($insumo->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $insumo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $insumo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $insumo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $insumo->id)]) ?>
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
