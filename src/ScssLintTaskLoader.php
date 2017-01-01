<?php

namespace Cheppers\Robo\ScssLint;

use League\Container\ContainerAwareInterface;
use Robo\Contract\OutputAwareInterface;

trait ScssLintTaskLoader
{
    /**
     * Wrapper for scss-lint.
     *
     * @param array $options
     *   Key-value pairs of options.
     * @param string[] $paths
     *   File paths.
     *
     * @return \Cheppers\Robo\ScssLint\Task\Run
     *   A lint runner task instance.
     */
    protected function taskScssLintRun(array $options = [], array $paths = [])
    {
        /** @var \Cheppers\Robo\ScssLint\Task\Run $task */
        $task = $this->task(Task\Run::class, $options, $paths);
        if ($this instanceof ContainerAwareInterface) {
            $task->setContainer($this->getContainer());
        }

        if ($this instanceof OutputAwareInterface) {
            $task->setOutput($this->output());
        }

        return $task;
    }
}
