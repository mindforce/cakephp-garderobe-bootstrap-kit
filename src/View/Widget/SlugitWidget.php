<?php
namespace Garderobe\BootstrapKit\View\Widget;

use Cake\View\Widget\BasicWidget;
use Cake\View\Form\ContextInterface;
use Cake\View\Helper\IdGeneratorTrait;

class SlugitWidget extends BasicWidget{

    use IdGeneratorTrait;

    protected $_View;
    protected $_tamplates;

    public function __construct($tamplates, $view)
    {
      $this->_tamplates = $tamplates;
      $this->_View = $view;
    }

    public function render(array $data, ContextInterface $context)
    {
      $this->_View->Html->script('Garderobe/BootstrapKit.slugit/jquery.slugit.js',['block' => true]);
      if(!isset($data['id'])){
        $data['id'] = $this->_id($data['name'], $data['value']);
      }
      $js = "$(function(){
          $('#".$data['id']."').slugIt();
      });";

      $this->_View->Html->scriptBlock($js,['block' => true]);

      $data['type'] = 'text';
      $data += [
  			'name' => 'slugit',
  		];

  		$data['value'] = $data['val'];
  		unset($data['val']);

      return $this->_tamplates->format('input', [
  			'name' => $data['name'],
  			'type' => $data['type'],
  			'attrs' => $this->_tamplates->formatAttributes(
  				$data,
  				['name', 'type']
  			),
  		]);
    }
}
