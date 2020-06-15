<?php

use Phinx\Migration\AbstractMigration;

class TodoTableMigration extends AbstractMigration
{


    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('todos');

        $table->addColumn('title', 'string')
            ->addColumn('description', 'string')
            ->addColumn('done', 'boolean', ['default' => false])
            ->addColumn('todo_list_id', 'integer')
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('todo_list_id', 'todo_lists', 'id',  ['delete' => 'cascade', 'update' => 'cascade'])
            ->create();

    }
}

