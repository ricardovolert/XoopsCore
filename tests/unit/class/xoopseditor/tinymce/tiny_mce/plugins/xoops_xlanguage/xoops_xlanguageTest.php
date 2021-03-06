<?php
require_once(dirname(__FILE__).'/../../../../../../init_new.php');

/**
* PHPUnit special settings :
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
class Plugins_Xoops_xlanguageTest extends \PHPUnit_Framework_TestCase
{
    protected $buffer = null;
    
    public function output_callback($buffer, $flags)
    {
        $this->buffer = $buffer;
        return '';
    }

    public function test_100()
    {
        $xoops_root_path = \XoopsBaseConfig::get('root-path');
		ob_start(array($this,'output_callback')); // to catch output after ob_end_flush in Xoops::simpleFooter
		require_once ($xoops_root_path.'/class/xoopseditor/tinymce/tiny_mce/plugins/xoops_xlanguage/xoops_xlanguage.php');
		$this->assertTrue(is_string($this->buffer));
    }
}
