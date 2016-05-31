<?php
/**
 * this source file is Worker.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-29 23-19
 */
namespace Worker;

class Worker
{
    public function run($job, &$log)
    {
        $log[] = "start";
        echo "hello";
        echo var_export($job, true);
    }
}
