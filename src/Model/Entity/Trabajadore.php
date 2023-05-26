<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trabajadore Entity
 *
 * @property int $id
 * @property int $persona_id
 * @property string $nom_banc
 * @property string $num_cuen
 * @property string|null $departamento
 *
 * @property \App\Model\Entity\Actividad[] $actividad
 * @property \App\Model\Entity\Persona $persona
 */
class Trabajadore extends Entity
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
        'nom_banc' => true,
        'num_cuen' => true,
        'departamento' => true,
        'actividad' => true,
        'persona' => true,
    ];
}
