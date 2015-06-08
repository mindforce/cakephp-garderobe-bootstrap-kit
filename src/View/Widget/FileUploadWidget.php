<?php

namespace Garderobe\BootstrapKit\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\Widget\FileWidget;

class FileUploadWidget extends FileWidget{

    protected $_View;

    public function __construct($templates, $view){
        $this->_View = $view;

        parent:: __construct($templates);
    }

    public function render(array $data, ContextInterface $context){
        $this->_View->Html->css('Garderobe/BootstrapKit.fileuploadplus/style.css', ['block' => true]);
        $this->_View->Html->css('Garderobe/BootstrapKit.fileuploadplus/jquery.fileupload.css', ['block' => true]);
        $this->_View->Html->script('Garderobe/BootstrapKit.fileuploadplus/vendor/jquery.ui.widget.js', ['block' => true]);
        $this->_View->Html->script('Garderobe/BootstrapKit.fileuploadplus/jquery.iframe-transport.js', ['block' => true]);
        $this->_View->Html->script('Garderobe/BootstrapKit.fileuploadplus/jquery.fileupload.js', ['block' => true]);
        $this->_View->Html->script('Garderobe/BootstrapKit.fileuploadplus/jquery.fileupload-process.js', ['block' => true]);
        $this->_View->Html->script('Garderobe/BootstrapKit.fileuploadplus/jquery.fileupload-validate.js', ['block' => true]);
        //$this->_View->Html->scriptBlock($js, ['block' => true]);
        if (!isset($data['class'])){
            $data['class'] = 'file-upload';
        } else {
            $data['class'] .= ' file-upload';
        }

        return parent::render($data, $context);
    }
}
