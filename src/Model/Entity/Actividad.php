<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Actividad Entity
 *
 * @property int $id
 * @property int $trabajador_id
 * @property string $nombre_act
 * @property \Cake\I18n\FrozenTime $fecha
 * @property string|null $descripcion
 *
 * @property \App\Model\Entity\Trabajadore $trabajadore
 */
class Actividad extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'trabajador_id' => true,
        'nombre_act' => true,
        'fecha' => true,
        'descripcion' => true,
        'trabajadore' => true,
    ];
}
