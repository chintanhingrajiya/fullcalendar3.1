<?php
/**/
namespace chintan\fullcalendar;

use yii\web\AssetBundle;
use Yii;
/**
 * 
 * FullCalendarAsset.php
 *
 
 */
class FullCalendarAsset extends AssetBundle
{
	public $depends = [
			'yii\web\JqueryAsset',
			'yii\web\YiiAsset',
			'yii\bootstrap\BootstrapAsset',
	];
	public $js = ['lib/moment.min.js', 'fullcalendar.js'];
	public $css = ['fullcalendar.css'];
	public $language;
	public $googleCalendar = false;
	public $sourcePath = '@vendor/chintan/yii2-fullcalendar/assets';

	public function init()
	{
		parent::init();
	}
	public function registerAssetFiles($view)
	{
		$language = $this->language ? $this->language : Yii::$app->language;
		$this->js[] = "lang/{$language}.js";
	
		if ($this->googleCalendar) {
			$this->js[] = "gcal.js";
		}
	
		$view->registerCssFile($this->baseUrl . '/' . 'fullcalendar.print.css', ['media' => 'print']);
	
		parent::registerAssetFiles($view);
	}
}