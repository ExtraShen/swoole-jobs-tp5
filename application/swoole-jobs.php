<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return $config = [
    //log目录
    'logPath'           => RUNTIME_PATH . '/swoole-jobs/log',
    'logSaveFileApp'    => 'application.log', //默认log存储名字
    'logSaveFileWorker' => 'crontab.log', // 进程启动相关log存储名字
    'pidPath'           => RUNTIME_PATH . '/swoole-jobs/log',
    'sleep'             => 2, // 队列没消息时，暂停秒数
    'processName'       => ':swooleTopicQueueTp5', // 设置进程名, 方便管理, 默认值 swooleTopicQueue
    //job任务相关
    'job'         => [
        'topics'  => [
            ['name'=>'MyJob', 'workerMinNum'=>1, 'workerMaxNum'=>20],
            // ['name'=> 'MyJob2', 'workerMinNum'=>3, 'workerMaxNum'=>10],
            // ['name'=> 'MyJob3', 'workerMinNum'=>1, 'workerMaxNum'=>10],
        ],
        // redis
        // 'queue'   => [
        //     'class'    => '\Kcloze\Jobs\Queue\RedisTopicQueue',
        //     'host'     => '127.0.0.1',
        //     'port'     => 6379,
        //     //'password'=> 'pwd',
        // ],

        // rabbitmq
        'queue'   => [
            'class'         => '\Kcloze\Jobs\Queue\RabbitmqTopicQueue',
            'host'          => '192.168.9.24',
            'user'          => 'phpadmin',
            'pass'          => 'phpadmin',
            'port'          => '5672',
            'vhost'         => 'php',
            'exchange'      => 'php.amqp.ext',
        ],

   ],
   //框架类型及装载类
   'framework' => [
       //可以自定义，但是该类必须继承\Kcloze\Jobs\Action\BaseAction
       'class'=> '\Kcloze\Jobs\Action\ThinkPHP5Action',

   ],
   'message'=> [
       'class'  => '\Kcloze\Jobs\Message\DingMessage',
       'token'  => '***your-dingding-token***',
   ],

];
