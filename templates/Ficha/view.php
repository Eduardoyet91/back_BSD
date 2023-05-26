<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ficha $ficha
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ficha'), ['action' => 'edit', $ficha->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ficha'), ['action' => 'delete', $ficha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ficha->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ficha'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ficha'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ficha view content">
            <h3><?= h($ficha->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Trabajadore') ?></th>
                    <td><?= $ficha->has('trabajadore') ? $this->Html->link($ficha->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $ficha->trabajadore->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Turno') ?></th>
                    <td><?= h($ficha->turno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ficha->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Entrada') ?></th>
                    <td><?= h($ficha->entrada) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salida') ?></th>
                    <td><?= h($ficha->salida) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($ficha->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
