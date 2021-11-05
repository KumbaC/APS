<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersInternalsFixture
 */
class UsersInternalsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => 'Correlativo de la tabla usuarios internos', 'precision' => null, 'unsigned' => null],
        'identification_card' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => false, 'collate' => null, 'comment' => 'Identificador del funcionario asociado al usuario interno', 'precision' => null],
        'email' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => false, 'collate' => null, 'comment' => 'Correo Institucional', 'precision' => null],
        'network_user' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => false, 'collate' => null, 'comment' => 'Usuario de red LDAP', 'precision' => null],
        'full_name' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => false, 'collate' => null, 'comment' => 'Nombre completo del usuario', 'precision' => null],
        'public_worker_id' => ['type' => 'integer', 'length' => 10, 'default' => '1', 'null' => false, 'comment' => 'Funcionario publico', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'role_id' => ['type' => 'integer', 'length' => 10, 'default' => '1', 'null' => false, 'comment' => 'Roles', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'default' => 1, 'null' => false, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'users_internals-identification_card_un' => ['type' => 'unique', 'columns' => ['identification_card'], 'length' => []],
            'users_internals-email_un' => ['type' => 'unique', 'columns' => ['email'], 'length' => []],
            'users_internals_roles_fk' => ['type' => 'foreign', 'columns' => ['role_id'], 'references' => ['roles', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'users_internals_workers_fk' => ['type' => 'foreign', 'columns' => ['public_worker_id'], 'references' => ['public_workers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'identification_card' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'network_user' => 'Lorem ipsum dolor sit amet',
                'full_name' => 'Lorem ipsum dolor sit amet',
                'public_worker_id' => 1,
                'role_id' => 1,
                'active' => 1,
            ],
        ];
        parent::init();
    }
}
