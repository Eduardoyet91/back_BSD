<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Propietario> $propietario
 */
?>
<div class="propietario index content">
    <?= $this->Html->link(__('New Propietario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Propietario') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('persona_id') ?></th>
                    <th><?= $this->Paginator->sort('edificio') ?></th>
                    <th><?= $this->Paginator->sort('apartamento') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($propietario as $propietario): ?>
                <tr>
                    <td><?= $this->Number->format($propietario->id) ?></td>
                    <td><?= $propietario->has('persona') ? $this->Html->link($propietario->persona->id, ['controller' => 'Persona', 'action' => 'view', $propietario->persona->id]) : '' ?></td>
                    <td><?= h($propietario->edificio) ?></td>
                    <td><?= h($propietario->apartamento) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $propietario->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propietario->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propietario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propietario->id)]) ?>
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
