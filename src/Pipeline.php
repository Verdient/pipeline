<?php

declare(strict_types=1);

namespace Verdient\Pipeline;

/**
 * 流水线
 * @author Verdient。
 */
class Pipeline
{
    /**
     * @var callable[] 管道链
     * @author Verdient。
     */
    protected $pipeChain = [];

    /**
     * @var bool 是否已完成
     * @author Verdient。
     */
    protected $isComplated = false;

    /**
     * 新增管道
     * @param callable $pipe
     * @return static
     * @author Verdient。
     */
    public function pipe(callable $pipe)
    {
        $this->pipeChain[] = $pipe;
        return $this;
    }

    /**
     * 处理
     * @param mixed $payload 荷载
     * @return mixed
     * @author Verdient。
     */
    public function process($payload)
    {
        foreach ($this->pipeChain as $pipe) {
            if ($this->isComplated !== true) {
                $payload = call_user_func($pipe, $payload, $this);
            }
        }
        $this->isComplated = true;
        return $payload;
    }

    /**
     * 中断流水线
     * @author Verdient。
     */
    public function break()
    {
        $this->isComplated = true;
    }
}
