<?php
require_once(dirname(__FILE__).'/../../../init_new.php');

/**
* PHPUnit special settings :
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
class XoopsXmlRpcFaultTest extends \PHPUnit_Framework_TestCase
{
    protected $myclass = 'XoopsXmlRpcFault';
    
    public function test___construct()
	{
		$code = 109;
		$str = 'string';
		$instance = new $this->myclass($code, $str);
		$this->assertInstanceof($this->myclass, $instance);
		$this->assertInstanceof('XoopsXmlRpcTag', $instance);
	}

    public function test_render()
    {
		$code = 999;
		$str = 'string';
		$instance = new $this->myclass($code, $str);
        
        $result = $instance->render();
        $expected =  '<fault><value><struct><member><name>faultCode</name><value>'
            . $code
            . '</value></member><member><name>faultString</name><value>'
            . 'Method response error' . "\n"
            . $instance->encode($str)
            . '</value></member></struct></value></fault>';

        $this->assertSame($expected, $result);
    }
}
