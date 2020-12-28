<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

define('THINK_VERSION', '5.0.21');
define('THINK_START_TIME', microtime(true));
define('THINK_START_MEM', memory_get_usage());
define('EXT', '.php');
define('DS', DIRECTORY_SEPARATOR);
defined('THINK_PATH') or define('THINK_PATH', __DIR__ . DS);
define('LIB_PATH', THINK_PATH . 'library' . DS);
define('CORE_PATH', LIB_PATH . 'think' . DS);
define('TRAIT_PATH', LIB_PATH . 'traits' . DS);
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
defined('ROOT_PATH') or define('ROOT_PATH', dirname(realpath(APP_PATH)) . DS);
defined('EXTEND_PATH') or define('EXTEND_PATH', ROOT_PATH . 'extend' . DS);
defined('VENDOR_PATH') or define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);
defined('RUNTIME_PATH') or define('RUNTIME_PATH', ROOT_PATH . 'runtime' . DS);
defined('LOG_PATH') or define('LOG_PATH', RUNTIME_PATH . 'log' . DS);
defined('CACHE_PATH') or define('CACHE_PATH', RUNTIME_PATH . 'cache' . DS);
defined('TEMP_PATH') or define('TEMP_PATH', RUNTIME_PATH . 'temp' . DS);
defined('CONF_PATH') or define('CONF_PATH', APP_PATH); // 配置文件目录
defined('CONF_EXT') or define('CONF_EXT', EXT); // 配置文件后缀
defined('ENV_PREFIX') or define('ENV_PREFIX', 'PHP_'); // 环境变量的配置前缀
if(defined('ADDON_PATH')){

    defined('PUBLIC_PATH') or define('PUBLIC_PATH', ADDON_PATH . '/core/public'.DS); // 配置文件目录
    defined('UPLOAD_OBPATH') or define('UPLOAD_OBPATH', 'https://'.$_SERVER['HTTP_HOST'].'/attachment/upload'.DS); // 配置文件目录
    defined('UPLOAD_PATH') or define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'].'/attachment/upload'.DS); // 配置文件目录
    defined('APP_PUBLIC_OBPATH') or define('APP_PUBLIC_OBPATH', 'https://'.$_SERVER['HTTP_HOST'].'/addons/longbing_shequpintuan/core/public'.DS); // 配置文件目录
    defined('APP_HOST_PUBLIC') or define('APP_HOST_PUBLIC', 'https://'.$_SERVER['HTTP_HOST'].'/addons/longbing_shequpintuan/core/public/init_image'.DS); // 配置文件目录
}else{
    defined('UPLOAD_PATH') or define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'].'/uploads'.DS); // 配置文件目录
    defined('UPLOAD_OBPATH') or define('UPLOAD_OBPATH', 'https://'.$_SERVER['HTTP_HOST'].'/uploads'.DS); // 配置文件目录
    defined('APP_PUBLIC_OBPATH') or define('APP_PUBLIC_OBPATH', 'https://'.$_SERVER['HTTP_HOST'].DS); // 配置文件目录
    defined('PUBLIC_PATH') or define('PUBLIC_PATH', ROOT_PATH.'public'.DS); // 配置文件目录
    defined('APP_HOST_PUBLIC') or define('APP_HOST_PUBLIC', 'https://'.$_SERVER['HTTP_HOST'].'/init_image'.DS); // 配置文件目录
}


//defined('IA_ROOT') or define('IA_ROOT', ROOT_PATH); // 如果不是从微擎过来的  定义为根目录

defined('APP_NAME') or define('APP_NAME', 'APP_NAME'); // 如果不是从微擎过来的  定义为根目录

defined('APP_STATIC_PATH') or define('APP_STATIC_PATH', 'https://'.$_SERVER['HTTP_HOST'].'/static/'); // 如果不是从微擎过来的  定义为根目录
// 环境常量
define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
define('IS_WIN', strpos(PHP_OS, 'WIN') !== false);

// 载入Loader类
require CORE_PATH . 'Loader.php';

// 加载环境变量配置文件
if (is_file(ROOT_PATH . '.env')) {
    $env = parse_ini_file(ROOT_PATH . '.env', true);

    foreach ($env as $key => $val) {
        $name = ENV_PREFIX . strtoupper($key);

        if (is_array($val)) {
            foreach ($val as $k => $v) {
                $item = $name . '_' . strtoupper($k);
                putenv("$item=$v");
            }
        } else {
            putenv("$name=$val");
        }
    }
}

// 注册自动加载
\think\Loader::register();

// 注册错误和异常处理机制
\think\Error::register();

// 加载惯例配置文件
\think\Config::set(include THINK_PATH . 'convention' . EXT);
