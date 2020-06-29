<?php
namespace Drupal\service_module\Controller;
use Drupal\Core\Controller\ControllerBase;

class ServiceModuleController  extends ControllerBase
{
	public function content()
	{
		$configs= \Drupal::service('config.factory')->listAll($prefix = "system");

		$rows = [];
		$headers = [
		$this->t('id'),
		$this->t('filename'),

		];
		$output=array();
		$a=1;
		foreach($configs as $k=>$data){
			
			$output[] = [
			'id' => $a,
			'filename' => $configs[$k],
			];
			$a++;
		}
	
		 $content['table'] = [
              '#type' => 'table',
              '#header' => $headers,
              '#rows' => $output,
              '#empty' => t('error 404 found'),
          ];
          return $content;
	
		
	}
	
}

?>