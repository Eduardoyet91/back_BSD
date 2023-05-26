<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Trabajadore> $trabajadores
 */
?>
<div class="trabajadores index content">
    <?= $this->Html->link(__('New Trabajadore'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trabajadores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('persona_id') ?></th>
                    <th><?= $this->Paginator->sort('nom_banc') ?></th>
                    <th><?= $this->Paginator->sort('num_cuen') ?></th>
                    <th><?= $this->Paginator->sort('departamento') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trabajadores as $trabajadore): ?>
                <tr>
                    <td><?= $this->Number->format($trabajadore->id) ?></td>
                    <td><?= $trabajadore->has('persona') ? $this->Html->link($trabajadore->persona->id, ['controller' => 'Persona', 'action' => 'view', $trabajadore->persona->id]) : '' ?></td>
                    <td><?= h($trabajadore->nom_banc) ?></td>
                    <td><?= h($trabajadore->num_cuen) ?></td>
                    <td><?= h($trabajadore->departamento) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $trabajadore->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trabajadore->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trabajadore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajadore->id)]) ?>
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
