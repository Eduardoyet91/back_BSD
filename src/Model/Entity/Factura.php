<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Factura Entity
 *
 * @property int $id
 * @property int $propietario_id
 * @property \Cake\I18n\FrozenTime|null $fecha
 * @property int $monto
 * @property string|null $status
 *
 * @property \App\Model\Entity\Propietario $propietario
 */
class Factura extends Entity
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
        'propietario_id' => true,
        'fecha' => true,
        'monto' => true,
        'status' => true,
        'propietario' => true,
    ];
}
