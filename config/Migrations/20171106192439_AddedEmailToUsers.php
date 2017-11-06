<?php
use Migrations\AbstractMigration;

class AddedEmailToUsers extends AbstractMigration
{

    public function up()
    {

        $this->table('users')
            ->addColumn('email', 'string', [
                'after' => 'last_name',
                'default' => null,
                'length' => 200,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('users')
            ->removeColumn('email')
            ->update();
    }
}

