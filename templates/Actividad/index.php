<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Actividad> $actividad
 */
?>
<div class="actividad index content">
    <?= $this->Html->link(__('New Actividad'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividad') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('trabajador_id') ?></th>
                    <th><?= $this->Paginator->sort('nombre_act') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividad as $actividad): ?>
                <tr>
                    <td><?= $this->Number->format($actividad->id) ?></td>
                    <td><?= $actividad->has('trabajadore') ? $this->Html->link($actividad->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $actividad->trabajadore->id]) : '' ?></td>
                    <td><?= h($actividad->nombre_act) ?></td>
                    <td><?= h($actividad->fecha) ?></td>
                    <td><?= h($actividad->descripcion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actividad->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actividad->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actividad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividad->id)]) ?>
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
