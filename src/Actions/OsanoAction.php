<?php

namespace Astrogoat\Osano\Actions;

use Helix\Lego\Apps\Actions\Action;

class OsanoAction extends Action
{
    public static function actionName(): string
    {
        return 'Osano action name';
    }

    public static function run(): mixed
    {
        return redirect()->back();
    }
}
