<?php
namespace Garderobe\BootstrapKit\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\Widget\CheckboxWidget;

/**
 * Input widget for creating switcher widgets.
 */
class SwitcherWidget extends CheckboxWidget
{

    /**
     * View instance.
     *
     * @var \Cake\View\View
     */
    protected $_View;

    /**
     * Label widget instance.
     *
     * @var \Cake\View\Widget\LabelWidget
     */
    protected $_hidden;

    public function __construct($templates, $hidden, $view)
    {
        $this->_View = $view;
        $this->_hidden = $hidden;
        parent::__construct($templates);
    }


    public function render(array $data, ContextInterface $context)
    {
        $this->_View->Html->css('Garderobe/BootstrapKit.switch/bootstrap-switch.min.css', ['block' => true]);
        $this->_View->Html->script('Garderobe/BootstrapKit.switch/bootstrap-switch.min.js', ['block' => true]);
        $js = "
        $(function(){
            $('.bootstrap-switcher').bootstrapSwitch();
        });
        ";
        $this->_View->Html->scriptBlock($js, ['block' => true]);
        if (!isset($data['class'])){
            $data['class'] = 'bootstrap-switcher';
        } else {
            $data['class'] .= ' bootstrap-switcher';
        }
        $hidden = '';
        if (!isset($data['hiddenField'])){
            $data['hiddenField'] = true;
        }
        if (($data['hiddenField'] != true)||($data['hiddenField'] !== false)) {
            $hiddenOptions = [
                'type' => 'hidden',
                'name' => $data['name'],
                'val' => ($data['hiddenField'] !== true ? $data['hiddenField'] : '0'),
                'form' => isset($data['form']) ? $data['form'] : null,
                'secure' => false
            ];
            if (isset($data['disabled']) && $data['disabled']) {
                $hiddenOptions['disabled'] = 'disabled';
            }
            $hidden = $this->_hidden->render($hiddenOptions, $context);
        }
        unset($data['hiddenField']);
        return $hidden.parent::render($data, $context);
    }
}
