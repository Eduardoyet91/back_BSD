<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ficha Model
 *
 * @property \App\Model\Table\TrabajadoresTable&\Cake\ORM\Association\BelongsTo $Trabajadores
 *
 * @method \App\Model\Entity\Ficha newEmptyEntity()
 * @method \App\Model\Entity\Ficha newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ficha[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ficha get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ficha findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ficha patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ficha[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ficha|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ficha saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ficha[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ficha[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ficha[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ficha[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FichaTable extends Table
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

        $this->setTable('ficha');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Trabajadores', [
            'foreignKey' => 'trabajador_id',
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
            ->integer('trabajador_id')
            ->notEmptyString('trabajador_id');

        $validator
            ->scalar('turno')
            ->maxLength('turno', 36)
            ->requirePresence('turno', 'create')
            ->notEmptyString('turno');

        $validator
            ->time('entrada')
            ->allowEmptyTime('entrada');

        $validator
            ->time('salida')
            ->allowEmptyTime('salida');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

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
        $rules->add($rules->existsIn('trabajador_id', 'Trabajadores'), ['errorField' => 'trabajador_id']);

        return $rules;
    }
}
