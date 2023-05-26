<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Persona> $persona
 */
?>
<div class="persona index content">
    <?= $this->Html->link(__('New Persona'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Persona') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cedula') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('apellido') ?></th>
                    <th><?= $this->Paginator->sort('rif') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persona as $persona): ?>
                <tr>
                    <td><?= $persona->id === null ? '' : $this->Number->format($persona->id) ?></td>
                    <td><?= $this->Number->format($persona->cedula) ?></td>
                    <td><?= h($persona->nombre) ?></td>
                    <td><?= h($persona->apellido) ?></td>
                    <td><?= $persona->rif === null ? '' : $this->Number->format($persona->rif) ?></td>
                    <td><?= $persona->telefono === null ? '' : $this->Number->format($persona->telefono) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $persona->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $persona->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?>
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
