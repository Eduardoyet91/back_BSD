<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividad $actividad
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Actividad'), ['action' => 'edit', $actividad->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actividad'), ['action' => 'delete', $actividad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividad->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actividad'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actividad'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividad view content">
            <h3><?= h($actividad->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Trabajadore') ?></th>
                    <td><?= $actividad->has('trabajadore') ? $this->Html->link($actividad->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $actividad->trabajadore->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre Act') ?></th>
                    <td><?= h($actividad->nombre_act) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($actividad->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actividad->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($actividad->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
