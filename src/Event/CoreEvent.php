<?php
/**
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) MindForce Team (http://mindforce.com)
* @link          http://mindforce.me Garderobe BootstrapKit CakePHP 3 Plugin
* @since         0.0.1
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
namespace Garderobe\BootstrapKit\Event;

use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Garderobe\BootstrapKit\View\Widget\SwitcherWidget;
use Garderobe\BootstrapKit\View\Widget\Select2BoxWidget;
use Garderobe\BootstrapKit\View\Widget\SlugitWidget;
use Garderobe\BootstrapKit\View\Widget\FileUploadWidget;

class CoreEvent implements EventListenerInterface {

    public function implementedEvents()
    {
        return array(
	        'View.beforeRender' => array(
                'callable' => 'addWidgets',
            ),
        );
    }

    public function addWidgets(Event $event, $viewFile)
    {
        $view = $event->getSubject();
        $widgetRegistry = $view->Form->widgetRegistry();

        //TODO: possible implement to load widget at once
        // Switcher loading section
        $switcher = new SwitcherWidget(
            $view->Form->templater(),
            $view->Form->widgetRegistry()->get('_default'),
            $view
        );
        $view->Form->addWidget('switcher', $switcher);

        // Select2 loader section
        //$view->Form->addWidget('select2', ['Garderobe/BootstrapKit.Select2Box']);
        $select2BoxWidget = new Select2BoxWidget(
            $view->Form->templater(),
            $view
        );
        $view->Form->addWidget('select2', $select2BoxWidget);


        $slugit = new SlugitWidget(
          $view->Form->templater(),
          $view
        );
        $view->Form->addWidget('slugit',$slugit);

        $slugit = new FileUploadWidget(
          $view->Form->templater(),
          $view
        );
        $view->Form->addWidget('fileupload',$slugit);

        //TODO: Editable loader section
    }

}
