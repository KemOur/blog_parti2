<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePostsTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('posts');
        $table->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['update' => 'CURRENT_TIMESTAMP'])
            ->addColumn('title', 'string')
            ->addColumn('body', 'text')
            ->create();
    }
}
