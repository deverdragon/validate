<?php
/**
 * @author gaobinzhan <gaobinzhan@gmail.com>
 */


namespace Qianlong\Validate\test;

require_once './BaseTestCase.php';

class IsArrayTest extends BaseTestCase
{
    public function testIsArray()
    {
        $this->validate->addColumn('test')->isArray();
        $this->assertEquals(false, $this->validate->validate(['test' => 1]));
        $this->assertEquals('test类型必须为数组', $this->validate->getError()->__toString());

        $this->freeValidate();
        $this->validate->addColumn('test')->isArray('传递错误');
        $this->assertEquals(false, $this->validate->validate(['test' => 1]));
        $this->assertEquals('传递错误', $this->validate->getError()->__toString());

        $this->freeValidate();
        $this->validate->addColumn('test')->isArray();
        $this->assertEquals(true, $this->validate->validate(['test' => []]));
        $this->assertEquals(null, $this->validate->getError());
    }
}