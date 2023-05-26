<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comprobante Entity
 *
 * @property int $id
 * @property int $orden_id
 * @property \Cake\I18n\FrozenTime|null $fecha
 * @property string|null $status
 *
 * @property \App\Model\Entity\Orden $orden
 */
class Comprobante extends Entity
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
        'orden_id' => true,
        'fecha' => true,
        'status' => true,
        'orden' => true,
    ];
}
