<?php

declare(strict_types=1);

namespace Verdient\Pipeline;

/**
 * 流程接口
 * @author Verdient。
 */
interface ProcessInterface
{
    /**
     * 流水线
     * @return Pipeline
     * @author Verdient。
     */
    public function pipeline(): Pipeline;
}
