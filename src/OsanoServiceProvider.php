<?php

namespace Astrogoat\Osano;

use Astrogoat\Osano\Settings\OsanoSettings;
use Helix\Lego\Apps\App;
use Helix\Lego\Apps\AppToken;
use Helix\Lego\Apps\Services\IncludeFrontendViews;
use Helix\Lego\LegoManager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OsanoServiceProvider extends PackageServiceProvider
{
    public function registerApp(App $app)
    {
        return $app
            ->name('osano')
            ->settings(OsanoSettings::class)
            ->migrations([
                __DIR__ . '/../database/migrations/settings',
            ])
            ->tokens([
                AppToken::name('Cookie preferences drawer trigger')
                    ->type(AppToken::TYPE_TEXT)
                    ->key('cookie-preferences-drawer-trigger')
                    ->value("event.preventDefault(); window.Osano.cm.showDrawer()")
                    ->description('To trigger the storage/cookie preferences drawer'),
                AppToken::name('Cookie banner trigger')
                    ->type(AppToken::TYPE_TEXT)
                    ->key('cookie-preferences-dialog-trigger')
                    ->value("event.preventDefault(); window.Osano.cm.showDialog()")
                    ->description('To trigger the cookie dialog aka. banner'),
                AppToken::name('Do Not Sell modal trigger')
                    ->type(AppToken::TYPE_TEXT)
                    ->key('cookie-preferences-dialog-trigger')
                    ->value("event.preventDefault(); window.Osano.cm.showDoNotSell()")
                    ->description('To trigger the Do Not Sell preferences modal'),
            ])
            ->includeFrontendViews(function (IncludeFrontendViews $frontendViews) {
                return $frontendViews->addToHead(view: 'osano::script', priority: 100);
            });
    }

    public function registeringPackage()
    {
        $this->callAfterResolving('lego', function (LegoManager $lego) {
            $lego->registerApp(fn (App $app) => $this->registerApp($app));
        });
    }

    public function configurePackage(Package $package): void
    {
        $package->name('osano')->hasConfigFile()->hasViews();
    }
}
