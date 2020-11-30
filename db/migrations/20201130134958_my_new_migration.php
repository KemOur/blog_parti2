<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MyNewMigration extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('posts');
        $table->addColumn('user_id', 'integer')
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'], ['update' => 'CURRENT_TIMESTAMP'])
            ->addColumn('title', 'string')
            ->addColumn('body', 'text')
            ->create();
    }
}

