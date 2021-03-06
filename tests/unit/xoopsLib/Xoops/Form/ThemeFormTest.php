<?php
namespace Xoops\Form;

require_once(dirname(__FILE__).'/../../../init_new.php');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-08-18 at 21:59:26.
 */

/**
 * PHPUnit special settings :
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */

class ThemeFormTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ThemeForm
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ThemeForm('Caption', 'name', 'action');
        $this->markTestSkipped('Needs XoopsTpl::assign() in Xoops::tpl()');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xoops\Form\ThemeForm::insertBreak
     */
    public function testInsertBreak()
    {
        $this->object->insertBreak();
        $value = $this->object->render();
        $this->assertTrue(false !== strpos($value, 'class="break"'));
        $this->assertTrue(false !== strpos($value, '>&nbsp;<'));

        $this->object->insertBreak('extra', 'class');
        $value = $this->object->render();
        $this->assertTrue(false !== strpos($value, 'class="class"'));
        $this->assertTrue(false !== strpos($value, '>extra<'));
    }

    /**
     * @covers Xoops\Form\ThemeForm::render
     */
    public function testRender()
    {
        $value = $this->object->render();
        $this->assertTrue(false !== strpos($value, '<form'));
        $this->assertTrue(false !== strpos($value, 'name="name"'));
        $this->assertTrue(false !== strpos($value, 'id="name"'));
        $this->assertTrue(false !== strpos($value, 'action="action"'));
        $this->assertTrue(false !== strpos($value, '<legend>Caption</legend>'));
    }
}
