<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Propietarios Model
 *
 * @property \App\Model\Table\PersonaTable&\Cake\ORM\Association\BelongsTo $Persona
 * @property \App\Model\Table\FacturaTable&\Cake\ORM\Association\HasMany $Factura
 *
 * @method \App\Model\Entity\Propietario newEmptyEntity()
 * @method \App\Model\Entity\Propietario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Propietario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Propietario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Propietario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Propietario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Propietario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Propietario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Propietario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Propietario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Propietario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Propietario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Propietario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PropietariosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('propietarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Persona', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Factura', [
            'foreignKey' => 'propietario_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('persona_id')
            ->notEmptyString('persona_id');

        $validator
            ->scalar('edificio')
            ->maxLength('edificio', 8)
            ->requirePresence('edificio', 'create')
            ->notEmptyString('edificio');

        $validator
            ->scalar('apartamento')
            ->maxLength('apartamento', 8)
            ->requirePresence('apartamento', 'create')
            ->notEmptyString('apartamento');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('persona_id', 'Persona'), ['errorField' => 'persona_id']);

        return $rules;
    }
}
