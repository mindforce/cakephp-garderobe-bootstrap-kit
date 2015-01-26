<?php
namespace Garderobe\BootstrapKit\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\Widget\SelectBoxWidget;
use Traversable;

class Select2BoxWidget extends SelectBoxWidget
{

    /**
     * View instance.
     *
     * @var \Cake\View\View
     */
    protected $_View;

    public function __construct($templates, $view)
    {
        $this->_View = $view;
        parent::__construct($templates);
    }

    public function render(array $data, ContextInterface $context)
    {
        $this->_View->Html->css('Garderobe/BootstrapKit.select2/select2.min.css', ['block' => true]);
        $this->_View->Html->css('Garderobe/BootstrapKit.select2/select2-bootstrap.css', ['block' => true]);
        $this->_View->Html->script('Garderobe/BootstrapKit.select2/select2.min.js', ['block' => true]);
        $js = "
        $(function(){
            $('.select2-input').select2({
                theme: 'bootstrap'
            });
        });
        ";
        $this->_View->Html->scriptBlock($js, ['block' => true]);
        if (!isset($data['class'])){
            $data['class'] = 'select2-input';
        } else {
            $data['class'] .= ' select2-input';
        }

        return parent::render($data, $context);
    }

}
