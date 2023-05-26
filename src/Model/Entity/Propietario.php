<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Propietario Entity
 *
 * @property int $id
 * @property int $persona_id
 * @property string $edificio
 * @property string $apartamento
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Factura[] $factura
 */
class Propietario extends Entity
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
        'persona_id' => true,
        'edificio' => true,
        'apartamento' => true,
        'persona' => true,
        'factura' => true,
    ];
}
