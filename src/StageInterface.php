<?php

declare(strict_types=1);

namespace Verdient\Pipeline;

/**
 * 步骤接口
 * @author Verdient。
 */
interface StageInterface
{
    /**
     * @param mixed $payload 荷载
     * @return mixed
     * @author Verdient。
     */
    public function __invoke($payload);
}
