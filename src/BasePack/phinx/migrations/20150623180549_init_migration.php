<?php
use Phinx\Migration\AbstractMigration;

class InitMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('project');
        $table
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('description', 'text')
            ->addColumn('priority', 'integer', ['default' => '50'])
            ->addColumn('status', 'integer', ['default' => '0'])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();

        $table = $this->table('task');
        $table
            ->addColumn('project_id', 'integer')
            ->addColumn('name', 'string', array('limit' => 50))
            ->addColumn('description', 'text')
            ->addColumn('priority', 'integer', ['default' => '0'])
            ->addColumn('time', 'integer', ['default' => '1'])
            ->addColumn('status', 'integer', ['default' => '0'])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
