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
                    ->value("event.preventDefault(); Osano.cm.showDrawer('osano-cm-dom-info-dialog-open')")
                    ->description('To trigger the Storage/Cookie preferences drawer'),
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
