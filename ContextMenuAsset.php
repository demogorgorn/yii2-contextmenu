<?php
/**
 * @package   yii2-contextmenu
 * @author    Oleg Martemjanov <demogorgorn@gmail.com>
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @version   1.6.6
 */
namespace demogorgorn\cxmenu;

class ContextMenuAsset extends \yii\web\AssetBundle
{

	public $sourcePath = '@bower/jQuery-contextMenu/src';

	/**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset'
    ];

    /**
     * Set up CSS and JS asset arrays based on the base-file names
     * @param string $type whether 'css' or 'js'
     * @param array $files the list of 'css' or 'js' basefile names
     */
    protected function setupAssets($type, $files = [])
    {
        $srcFiles = [];
        $minFiles = [];
        foreach ($files as $file) {
            $srcFiles[] = "{$file}.{$type}";
            $minFiles[] = "{$file}.min.{$type}";
        }
        if (empty($this->$type)) {
            $this->$type = YII_DEBUG ? $srcFiles : $minFiles;
        }
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setupAssets('css', ['jquery.contextMenu']);
        $this->setupAssets('js', ['jquery.contextMenu']);
        parent::init();
    }
}