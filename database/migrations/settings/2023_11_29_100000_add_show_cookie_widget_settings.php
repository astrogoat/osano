<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('osano.show_cookie_widget', true);
    }

    public function down()
    {
        $this->migrator->delete('osano.show_cookie_widget');
    }
};
