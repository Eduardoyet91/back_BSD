<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trabajadore $trabajadore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Trabajadore'), ['action' => 'edit', $trabajadore->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Trabajadore'), ['action' => 'delete', $trabajadore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajadore->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trabajadores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Trabajadore'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trabajadores view content">
            <h3><?= h($trabajadore->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Persona') ?></th>
                    <td><?= $trabajadore->has('persona') ? $this->Html->link($trabajadore->persona->id, ['controller' => 'Persona', 'action' => 'view', $trabajadore->persona->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Nom Banc') ?></th>
                    <td><?= h($trabajadore->nom_banc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num Cuen') ?></th>
                    <td><?= h($trabajadore->num_cuen) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departamento') ?></th>
                    <td><?= h($trabajadore->departamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($trabajadore->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Actividad') ?></h4>
                <?php if (!empty($trabajadore->actividad)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Trabajador Id') ?></th>
                            <th><?= __('Nombre Act') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($trabajadore->actividad as $actividad) : ?>
                        <tr>
                            <td><?= h($actividad->id) ?></td>
                            <td><?= h($actividad->trabajador_id) ?></td>
                            <td><?= h($actividad->nombre_act) ?></td>
                            <td><?= h($actividad->fecha) ?></td>
                            <td><?= h($actividad->descripcion) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Actividad', 'action' => 'view', $actividad->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Actividad', 'action' => 'edit', $actividad->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Actividad', 'action' => 'delete', $actividad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividad->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
