<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Persona $persona
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persona'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Persona'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persona view content">
            <h3><?= h($persona->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($persona->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($persona->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $persona->id === null ? '' : $this->Number->format($persona->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cedula') ?></th>
                    <td><?= $this->Number->format($persona->cedula) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rif') ?></th>
                    <td><?= $persona->rif === null ? '' : $this->Number->format($persona->rif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= $persona->telefono === null ? '' : $this->Number->format($persona->telefono) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Propietarios') ?></h4>
                <?php if (!empty($persona->propietarios)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Persona Id') ?></th>
                            <th><?= __('Edificio') ?></th>
                            <th><?= __('Apartamento') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($persona->propietarios as $propietarios) : ?>
                        <tr>
                            <td><?= h($propietarios->id) ?></td>
                            <td><?= h($propietarios->persona_id) ?></td>
                            <td><?= h($propietarios->edificio) ?></td>
                            <td><?= h($propietarios->apartamento) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Propietarios', 'action' => 'view', $propietarios->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Propietarios', 'action' => 'edit', $propietarios->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Propietarios', 'action' => 'delete', $propietarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propietarios->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Trabajadores') ?></h4>
                <?php if (!empty($persona->trabajadores)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Persona Id') ?></th>
                            <th><?= __('Nom Banc') ?></th>
                            <th><?= __('Num Cuen') ?></th>
                            <th><?= __('Departamento') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($persona->trabajadores as $trabajadores) : ?>
                        <tr>
                            <td><?= h($trabajadores->id) ?></td>
                            <td><?= h($trabajadores->persona_id) ?></td>
                            <td><?= h($trabajadores->nom_banc) ?></td>
                            <td><?= h($trabajadores->num_cuen) ?></td>
                            <td><?= h($trabajadores->departamento) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Trabajadores', 'action' => 'view', $trabajadores->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Trabajadores', 'action' => 'edit', $trabajadores->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trabajadores', 'action' => 'delete', $trabajadores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajadores->id)]) ?>
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
