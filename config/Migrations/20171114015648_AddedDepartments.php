<?php
use Migrations\AbstractMigration;

class AddedDepartments extends AbstractMigration
{

    public function up()
    {
        $this->table('evidence_items')
            ->removeIndexByName('evidence_items_officer_id_index')
            ->removeIndexByName('evidence_items_user_id_index')
            ->update();

        $this->table('evidence_items')
            ->changeColumn('description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->changeColumn('origin', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->changeColumn('is_sealed', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->changeColumn('is_deleted', 'boolean', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->changeColumn('officer_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->changeColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->update();
        $this->table('files')
            ->removeIndexByName('files_evidence_item_id_index')
            ->update();

        $this->table('files')
            ->changeColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->changeColumn('path', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->changeColumn('detail', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->changeColumn('evidence_item_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->changeColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->update();

        $this->table('officer_ranks')
            ->changeColumn('rank_code', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->changeColumn('rank_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->changeColumn('rank_description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->update();
        $this->table('officers')
            ->removeIndexByName('officers_user_id_index')
            ->removeIndexByName('officers_officer_rank_id_index')
            ->update();

        $this->table('officers')
            ->changeColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->changeColumn('officer_rank_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->update();
        $this->table('user_confirmations')
            ->removeIndexByName('user_confirmations_user_id_index')
            ->update();

        $this->table('user_confirmations')
            ->changeColumn('uuid', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
            ->changeColumn('is_confirmed', 'boolean', [
                'comment' => '0 : FALSE | 1 : TRUE',
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->update();

        $this->table('users')
            ->changeColumn('is_admin', 'boolean', [
                'comment' => '0 : FALSE | 1 : TRUE',
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->changeColumn('first_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->changeColumn('last_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->changeColumn('email', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->changeColumn('username', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
            ->changeColumn('password', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => false,
            ])
            ->changeColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->update();

        $this->table('departments')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 512,
                'null' => true,
            ])
            ->create();

        $this->table('evidence_items')
            ->addIndex(
                [
                    'officer_id',
                ],
                [
                    'name' => 'officer_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('files')
            ->addIndex(
                [
                    'evidence_item_id',
                ],
                [
                    'name' => 'evidence_item_id',
                ]
            )
            ->update();

        $this->table('officer_ranks')
            ->addColumn('department_id', 'integer', [
                'after' => 'rank_description',
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'department_id',
                ],
                [
                    'name' => 'department_id',
                ]
            )
            ->update();

        $this->table('officers')
            ->addIndex(
                [
                    'officer_rank_id',
                ],
                [
                    'name' => 'officer_rank_id',
                ]
            )
            ->update();

        $this->table('evidence_items')
            ->addForeignKey(
                'officer_id',
                'officers',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('files')
            ->addForeignKey(
                'evidence_item_id',
                'evidence_items',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('officer_ranks')
            ->addForeignKey(
                'department_id',
                'departments',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('officers')
            ->addForeignKey(
                'officer_rank_id',
                'officer_ranks',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('user_confirmations')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('evidence_items')
            ->dropForeignKey(
                'officer_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('files')
            ->dropForeignKey(
                'evidence_item_id'
            );

        $this->table('officer_ranks')
            ->dropForeignKey(
                'department_id'
            );

        $this->table('officers')
            ->dropForeignKey(
                'officer_rank_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('user_confirmations')
            ->dropForeignKey(
                'user_id'
            );

        $this->table('evidence_items')
            ->removeIndexByName('officer_id')
            ->removeIndexByName('user_id')
            ->update();

        $this->table('evidence_items')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('description', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('origin', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('is_sealed', 'boolean', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('is_deleted', 'boolean', [
                'default' => '0',
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('officer_id', 'integer', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('created', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'officer_id',
                ],
                [
                    'name' => 'evidence_items_officer_id_index',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'evidence_items_user_id_index',
                ]
            )
            ->update();

        $this->table('files')
            ->removeIndexByName('evidence_item_id')
            ->update();

        $this->table('files')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('name', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('path', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('detail', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('evidence_item_id', 'integer', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('created', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'evidence_item_id',
                ],
                [
                    'name' => 'files_evidence_item_id_index',
                ]
            )
            ->update();

        $this->table('officer_ranks')
            ->removeIndexByName('department_id')
            ->update();

        $this->table('officer_ranks')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('rank_code', 'string', [
                'default' => null,
                'length' => 10,
                'null' => true,
            ])
            ->changeColumn('rank_name', 'string', [
                'default' => null,
                'length' => 50,
                'null' => true,
            ])
            ->changeColumn('rank_description', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->removeColumn('department_id')
            ->update();

        $this->table('officers')
            ->removeIndexByName('officer_rank_id')
            ->update();

        $this->table('officers')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('email', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('officer_rank_id', 'integer', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'officers_user_id_index',
                    'unique' => true,
                ]
            )
            ->addIndex(
                [
                    'officer_rank_id',
                ],
                [
                    'name' => 'officers_officer_rank_id_index',
                ]
            )
            ->update();

        $this->table('user_confirmations')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('uuid', 'string', [
                'default' => null,
                'length' => 40,
                'null' => true,
            ])
            ->changeColumn('is_confirmed', 'boolean', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_confirmations_user_id_index',
                    'unique' => true,
                ]
            )
            ->update();

        $this->table('users')
            ->changeColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('is_admin', 'boolean', [
                'default' => '0',
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('first_name', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('last_name', 'string', [
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->changeColumn('email', 'string', [
                'default' => null,
                'length' => 200,
                'null' => true,
            ])
            ->changeColumn('username', 'string', [
                'default' => null,
                'length' => 40,
                'null' => true,
            ])
            ->changeColumn('password', 'string', [
                'default' => null,
                'length' => 60,
                'null' => true,
            ])
            ->changeColumn('created', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->dropTable('departments');
    }
}

