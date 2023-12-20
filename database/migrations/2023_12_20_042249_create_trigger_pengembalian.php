<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerPengembalian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_pengembalian AFTER UPDATE ON sewas
            FOR EACH ROW
            BEGIN
                IF OLD.status_pengembalian = "Disewa" AND NEW.status_pengembalian = "Dikembalikan" THEN
                    INSERT INTO pengembalians (sewa_id, return_date, created_at, updated_at)
                    VALUES (NEW.id, NOW(), NOW(), NOW());

                    UPDATE cars SET status = "Tersedia" WHERE id = NEW.id;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_pengembalian');
    }
}

