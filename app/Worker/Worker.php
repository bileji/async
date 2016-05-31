<?php
/**
 * this source file is Worker.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-29 23-19
 */
namespace Worker;

use App\Utils\Logger;
use Exception;
use GearmanJob;

class Worker
{
    public function run(GearmanJob $job, &$log)
    {
        $workload = json_decode($job->workload(), true);

        try {
            $workload['method'] = empty($workload['method']) ? 'progress' : $workload['method'];
            Logger::info(__CLASS__ . '->' . $workload['method'] . ' got workload.', $workload);
            $result = call_user_func_array([$this, $workload['method']], [$workload, $log]);
            Logger::info('result of the ' . __CLASS__ . '->' . $workload['method'] . '.', $result);
        } catch (Exception $e) {
            Logger::emerg('class ' . __CLASS__ . ' throw exception:' . $e->getMessage(), $workload);
        }
    }
}
