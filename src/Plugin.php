<?php
namespace Garderobe\BootstrapKit;

use Cake\Core\BasePlugin;
use Cake\Core\PluginApplicationInterface;
use Cake\Event\EventManager;

class Plugin extends BasePlugin
{

    public function bootstrap(PluginApplicationInterface $app)
    {
        parent::bootstrap($app);

        //App core event with widgets bulk load
        EventManager::instance()->on(
            new \Garderobe\BootstrapKit\Event\CoreEvent,
            ['priority' => 10]
        );
    }

}
