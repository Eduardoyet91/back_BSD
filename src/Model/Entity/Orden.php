<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orden Entity
 *
 * @property int $id
 * @property string|null $tipo
 * @property string $banco
 * @property int $destino
 * @property string $titular
 * @property int $monto
 * @property \Cake\I18n\FrozenTime|null $fecha
 * @property string|null $status
 * @property string|null $servicio
 * @property int|null $insumo_id
 * @property int|null $trabajador_id
 *
 * @property \App\Model\Entity\Insumo $insumo
 * @property \App\Model\Entity\Trabajadore $trabajadore
 */
class Orden extends Entity
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
        'tipo' => true,
        'banco' => true,
        'destino' => true,
        'titular' => true,
        'monto' => true,
        'fecha' => true,
        'status' => true,
        'servicio' => true,
        'insumo_id' => true,
        'trabajador_id' => true,
        'insumo' => true,
        'trabajadore' => true,
    ];
}
