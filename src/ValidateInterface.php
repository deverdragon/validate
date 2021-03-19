<?php
/*
 * @Description    : 
 * @Version        : 1.0.0
 * @Author         : QianLong
 * @Date           : 2021-03-20 00:35:55
 * @LastEditors    : QianLong
 * @LastEditTime   : 2021-03-20 00:51:13
 */

namespace Qianlong\Validate;

use EasySwoole\Spl\SplArray;

interface ValidateInterface
{
    /**
     * 返回当前校验规则的名字
     * @return string
     */
    public function name(): string;

    /**
     * 检验失败返回错误信息即可
     *
     * @param SplArray $spl
     * @param string $column
     * @param mixed ...$args
     * @return string|null
     */
    public function validate(SplArray $spl, $column, ...$args): ?string;
}