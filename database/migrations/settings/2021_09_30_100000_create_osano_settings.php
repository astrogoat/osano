<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('osano.enabled', false);
        $this->migrator->add('osano.account_id', '');
        $this->migrator->add('osano.configuration_id', '');
    }

    public function down()
    {
        $this->migrator->delete('osano.enabled');
        $this->migrator->delete('osano.account_id');
        $this->migrator->delete('osano.configuration_id');
    }
};
