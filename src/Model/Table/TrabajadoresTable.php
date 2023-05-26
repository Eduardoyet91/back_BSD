<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trabajadores Model
 *
 * @property \App\Model\Table\PersonaTable&\Cake\ORM\Association\BelongsTo $Persona
 *
 * @method \App\Model\Entity\Trabajadore newEmptyEntity()
 * @method \App\Model\Entity\Trabajadore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Trabajadore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trabajadore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trabajadore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Trabajadore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trabajadore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trabajadore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trabajadore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trabajadore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trabajadore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trabajadore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trabajadore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TrabajadoresTable extends Table
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

        $this->setTable('trabajadores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Persona', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER',
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
            ->scalar('nom_banc')
            ->maxLength('nom_banc', 8)
            ->requirePresence('nom_banc', 'create')
            ->notEmptyString('nom_banc');

        $validator
            ->scalar('num_cuen')
            ->maxLength('num_cuen', 8)
            ->requirePresence('num_cuen', 'create')
            ->notEmptyString('num_cuen');

        $validator
            ->scalar('departamento')
            ->maxLength('departamento', 8)
            ->allowEmptyString('departamento');

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
