<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropAllTables extends Command
{
    protected $signature = 'db:drop-all';
    protected $description = 'Drop all tables from the database';

    public function handle()
    {
        Schema::disableForeignKeyConstraints();

        $tables = DB::select('SHOW TABLES');
        $dbName = 'Tables_in_' . DB::getDatabaseName();

        foreach ($tables as $table) {
            Schema::drop($table->$dbName);
            $this->info("Dropped: " . $table->$dbName);
        }

        Schema::enableForeignKeyConstraints();
        $this->info("All tables dropped.");
    }
}
