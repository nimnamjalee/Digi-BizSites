
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE users
            MODIFY COLUMN role
            ENUM('user', 'client', 'seller', 'customer', 'super_admin')
            NOT NULL DEFAULT 'user'
        ");
    }

    public function down(): void
    {
        // Keep the expanded role options to avoid
        // accidentally breaking existing user accounts.
    }
};
