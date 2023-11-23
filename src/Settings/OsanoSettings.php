<?php

namespace Astrogoat\Osano\Settings;

use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;

class OsanoSettings extends AppSettings
{
    public string $account_id;
    public string $configuration_id;

    public function rules(): array
    {
        return [
             'account_id' => Rule::requiredIf($this->enabled === true),
             'configuration_id' => Rule::requiredIf($this->enabled === true),
        ];
    }

    public function description(): string
    {
        return 'Interact with Osano.';
    }

    public static function group(): string
    {
        return 'osano';
    }

    public function labels(): array
    {
        return [
            'account_id' => 'Account ID',
            'configuration_id' => 'Configuration ID',
        ];
    }

    public function help(): array
    {
        return [
            'account_id' => 'Your Osano account ID can be found in the Osano dashboard, under your cookie consent configuration, and click "Get Code". The first string of random text after "cmp.osano.com/" is your account ID (do not include the forward slashes ("/")). E.g. "JiyzxlTvcbPaU3v4y".',
            'configuration_id' => 'Your Osano configuration ID is the second string of random text after your account ID up until "/osano.js" (do not include the forward slashes ("/")). E.g. "fe9b6d40-6a13-49a8-a8d0-fdb931ab4c32".',
        ];
    }
}
