<?php

use Phinx\Migration\AbstractMigration;

class InitMigration extends AbstractMigration
{
    /**
    * Change Method.
    *
    * Write your reversible migrations using this method.
    *
    * More information on writing migrations is available here:
    * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
    */
    public function change()
    {
        $table = $this->table('project');
        $table
            ->addColumn('name', 'string', array('limit' => 50))
            ->addColumn('description', 'text')
            ->addColumn('priority', 'integer')
            ->addColumn('status', 'integer')
            ->addColumn('created', 'datetime')
            ->create();

        $table = $this->table('task');
        $table
            ->addColumn('project_id', 'integer')
            ->addColumn('name', 'string', array('limit' => 50))
            ->addColumn('description', 'text')
            ->addColumn('priority', 'integer')
            ->addColumn('time', 'integer')
            ->addColumn('status', 'integer')
            ->addColumn('created', 'datetime')
            ->create();
    }
}
