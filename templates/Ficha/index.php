<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ficha> $ficha
 */
?>
<div class="ficha index content">
    <?= $this->Html->link(__('New Ficha'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ficha') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('trabajador_id') ?></th>
                    <th><?= $this->Paginator->sort('turno') ?></th>
                    <th><?= $this->Paginator->sort('entrada') ?></th>
                    <th><?= $this->Paginator->sort('salida') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ficha as $ficha): ?>
                <tr>
                    <td><?= $this->Number->format($ficha->id) ?></td>
                    <td><?= $ficha->has('trabajadore') ? $this->Html->link($ficha->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $ficha->trabajadore->id]) : '' ?></td>
                    <td><?= h($ficha->turno) ?></td>
                    <td><?= h($ficha->entrada) ?></td>
                    <td><?= h($ficha->salida) ?></td>
                    <td><?= h($ficha->fecha) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ficha->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ficha->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ficha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ficha->id)]) ?>
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
