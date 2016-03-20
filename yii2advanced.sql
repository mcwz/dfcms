-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-03-20 05:52:07
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- 表的结构 `attrs`
--

CREATE TABLE `attrs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `label` varchar(500) NOT NULL,
  `type` smallint(6) NOT NULL,
  `rules` varchar(200) NOT NULL DEFAULT '',
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `attrs`
--

INSERT INTO `attrs` (`id`, `name`, `label`, `type`, `rules`, `created_at`, `updated_at`) VALUES
(1, 'bt', '标题', 1, 'required', 1457175722, 1457175722),
(2, 'btx', '标题1', 1, 'required', 1457175722, 1457175722);

-- --------------------------------------------------------

--
-- 表的结构 `attr_group`
--

CREATE TABLE `attr_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `attr_group`
--

INSERT INTO `attr_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '新的属性组', 1456639999, 1456639999),
(2, '属性组2', 1457268020, 1457268020);

-- --------------------------------------------------------

--
-- 表的结构 `attr_group_assign`
--

CREATE TABLE `attr_group_assign` (
  `id` int(10) UNSIGNED NOT NULL,
  `attr_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `attr_group_assign`
--

INSERT INTO `attr_group_assign` (`id`, `attr_id`, `group_id`, `created_at`) VALUES
(9, 1, 1, 1457245503),
(10, 2, 1, 1457245503);

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1456196910),
('admin', '2', 1455448801),
('admin', '3', 1455448812);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, '管理员', NULL, NULL, 1454380152, 1454476419),
('attrModule', 2, '附加属性', NULL, NULL, 1457853188, 1457853188),
('contentModule', 2, '内容模块', NULL, NULL, 1457853263, 1457853263),
('nodeModule', 2, '节点模块', NULL, NULL, 1457853248, 1457853248),
('rbacModule', 2, '模块管理', NULL, NULL, 1454379689, 1454379689),
('userGroupManage', 2, '用户分组模块', NULL, NULL, 1456206192, 1456206192),
('userManage', 2, '用户管理', NULL, NULL, 1454482028, 1454482028);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'attrModule'),
('admin', 'contentModule'),
('admin', 'nodeModule'),
('admin', 'rbacModule'),
('admin', 'userGroupManage'),
('admin', 'userManage');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE `content` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT '',
  `editor_id` int(10) UNSIGNED NOT NULL,
  `editor_name` varchar(50) NOT NULL,
  `node_id` int(11) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `editor_id`, `editor_name`, `node_id`, `created_at`, `updated_at`, `status`) VALUES
(1, '新', 'ccccc7ddd', 1, 'admin', 3, 1457771188, 1457790258, 3);

-- --------------------------------------------------------

--
-- 表的结构 `content_attr`
--

CREATE TABLE `content_attr` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `content` longtext NOT NULL,
  `attr` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `content_attr`
--

INSERT INTO `content_attr` (`content_id`, `content`, `attr`) VALUES
(1, '<p>下次ccyyx</p>', '{"content_attr": "{\\"bt\\":\\"\\\\u53d1xxyyuu66666\\",\\"btx\\":\\"\\\\u8bddxxyyuu\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "发xxyyuu66666", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "话xxyyuu", "created_at": "1457175722", "updated_at": "1457175722"}]}'),
(2, '<p>达到</p>', '{"content_attr": "{\\"bt\\":\\"\\\\u7684\\",\\"btx\\":\\"\\\\u7684\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "的", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "的", "created_at": "1457175722", "updated_at": "1457175722"}]}');

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE `log` (
  `id` bigint(20) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_time` double DEFAULT NULL,
  `prefix` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`id`, `level`, `category`, `log_time`, `prefix`, `message`) VALUES
(1, 2, 'operations', 1457856915.654, '[127.0.0.1][1][-]', '用户(username:admin) 访问了未授权的页面(requestedRoute:content/index,defined moduleName:content2Module)'),
(2, 4, 'application', 1457856915.5905, '[127.0.0.1][1][-]', '$_COOKIE = [\n    ''_csrf'' => ''099f3a91f5b5bba2d643b4c01c0a89e71bac99b281aaec265a4cabdb8fcaf8cba:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"aUld2Zkq_QXMTQpbdDPJE68QDKbRsz1X\\";}''\n    ''PHPSESSID'' => ''m0qfbh6gk7iiqahs3um0ccrtj6''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/index''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=099f3a91f5b5bba2d643b4c01c0a89e71bac99b281aaec265a4cabdb8fcaf8cba%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22aUld2Zkq_QXMTQpbdDPJE68QDKbRsz1X%22%3B%7D; PHPSESSID=m0qfbh6gk7iiqahs3um0ccrtj6; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''59590''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/index''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''''\n    ''REQUEST_URI'' => ''/content/index''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1457856915.584\n    ''REQUEST_TIME'' => 1457856915\n]'),
(3, 1, 'yii\\web\\HttpException:403', 1457856916.0134, '[127.0.0.1][1][m0qfbh6gk7iiqahs3um0ccrtj6]', 'exception ''yii\\web\\ForbiddenHttpException'' with message ''您没有执行此操作的权限。'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\filters\\AccessControl.php:151\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\filters\\AccessControl.php(134): yii\\filters\\AccessControl->denyAccess(Object(yii\\web\\User))\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\ActionFilter.php(71): yii\\filters\\AccessControl->beforeAction(Object(yii\\base\\InlineAction))\n#2 [internal function]: yii\\base\\ActionFilter->beforeFilter(Object(yii\\base\\ActionEvent))\n#3 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Component.php(541): call_user_func(Array, Object(yii\\base\\ActionEvent))\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(263): yii\\base\\Component->trigger(''beforeAction'', Object(yii\\base\\ActionEvent))\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Controller.php(108): yii\\base\\Controller->beforeAction(Object(yii\\base\\InlineAction))\n#6 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(149): yii\\web\\Controller->beforeAction(Object(yii\\base\\InlineAction))\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''no-permission'', Array)\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''site/no-permiss...'', Array)\n#9 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#10 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#11 {main}'),
(4, 4, 'application', 1457856915.9485, '[127.0.0.1][1][m0qfbh6gk7iiqahs3um0ccrtj6]', '$_COOKIE = [\n    ''_csrf'' => ''099f3a91f5b5bba2d643b4c01c0a89e71bac99b281aaec265a4cabdb8fcaf8cba:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"aUld2Zkq_QXMTQpbdDPJE68QDKbRsz1X\\";}''\n    ''PHPSESSID'' => ''m0qfbh6gk7iiqahs3um0ccrtj6''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/index''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=099f3a91f5b5bba2d643b4c01c0a89e71bac99b281aaec265a4cabdb8fcaf8cba%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22aUld2Zkq_QXMTQpbdDPJE68QDKbRsz1X%22%3B%7D; PHPSESSID=m0qfbh6gk7iiqahs3um0ccrtj6; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''59591''\n    ''REDIRECT_URL'' => ''http://backend.dev/site/no-permission''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''''\n    ''REQUEST_URI'' => ''/site/no-permission''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1457856915.94\n    ''REQUEST_TIME'' => 1457856915\n]'),
(5, 1, 'yii\\web\\HttpException:403', 1457856956.278, '[127.0.0.1][1][m0qfbh6gk7iiqahs3um0ccrtj6]', 'exception ''yii\\web\\ForbiddenHttpException'' with message ''您没有执行此操作的权限。'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\filters\\AccessControl.php:151\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\filters\\AccessControl.php(134): yii\\filters\\AccessControl->denyAccess(Object(yii\\web\\User))\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\ActionFilter.php(71): yii\\filters\\AccessControl->beforeAction(Object(yii\\base\\InlineAction))\n#2 [internal function]: yii\\base\\ActionFilter->beforeFilter(Object(yii\\base\\ActionEvent))\n#3 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Component.php(541): call_user_func(Array, Object(yii\\base\\ActionEvent))\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(263): yii\\base\\Component->trigger(''beforeAction'', Object(yii\\base\\ActionEvent))\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Controller.php(108): yii\\base\\Controller->beforeAction(Object(yii\\base\\InlineAction))\n#6 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(149): yii\\web\\Controller->beforeAction(Object(yii\\base\\InlineAction))\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''no-permission'', Array)\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''site/no-permiss...'', Array)\n#9 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#10 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#11 {main}'),
(6, 4, 'application', 1457856956.2095, '[127.0.0.1][1][m0qfbh6gk7iiqahs3um0ccrtj6]', '$_COOKIE = [\n    ''_csrf'' => ''099f3a91f5b5bba2d643b4c01c0a89e71bac99b281aaec265a4cabdb8fcaf8cba:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"aUld2Zkq_QXMTQpbdDPJE68QDKbRsz1X\\";}''\n    ''PHPSESSID'' => ''m0qfbh6gk7iiqahs3um0ccrtj6''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/index''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=099f3a91f5b5bba2d643b4c01c0a89e71bac99b281aaec265a4cabdb8fcaf8cba%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22aUld2Zkq_QXMTQpbdDPJE68QDKbRsz1X%22%3B%7D; PHPSESSID=m0qfbh6gk7iiqahs3um0ccrtj6; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''59616''\n    ''REDIRECT_URL'' => ''http://backend.dev/site/no-permission''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''''\n    ''REQUEST_URI'' => ''/site/no-permission''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1457856956.2\n    ''REQUEST_TIME'' => 1457856956\n]'),
(7, 1, 'yii\\base\\ErrorException:1', 1457910482.3573, '[127.0.0.1][1][f2a9q0srhtmf0su983i9b0gqt5]', 'exception ''yii\\base\\ErrorException'' with message ''Class ''Html'' not found'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\views\\site\\index.php:10\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}'),
(8, 4, 'application', 1457910482.2827, '[127.0.0.1][1][f2a9q0srhtmf0su983i9b0gqt5]', '$_COOKIE = [\n    ''PHPSESSID'' => ''f2a9q0srhtmf0su983i9b0gqt5''\n    ''_csrf'' => ''565c455394720f051d0812c0ff626b7be971cf2615f517500ac81fcb15231889a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"DQ5CqORBAhwbb__rDiwoF3ud1Q1klxx_\\";}''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''PHPSESSID=f2a9q0srhtmf0su983i9b0gqt5; _csrf=565c455394720f051d0812c0ff626b7be971cf2615f517500ac81fcb15231889a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22DQ5CqORBAhwbb__rDiwoF3ud1Q1klxx_%22%3B%7D; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''64273''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''''\n    ''REQUEST_URI'' => ''/''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1457910482.27\n    ''REQUEST_TIME'' => 1457910482\n]'),
(9, 2, 'operations', 1457911410.4929, '[127.0.0.1][-][-]', '登录错误(username:admin) password:admin'),
(10, 4, 'application', 1457911409.8232, '[127.0.0.1][-][-]', '$_POST = [\n    ''_csrf'' => ''Xy1KMy5zbnQbfH9wXzw8Nh5FPVFMLDEGG0Q9XGhAGxBufHtYQgsWKw==''\n    ''LoginForm'' => [\n        ''username'' => ''admin''\n        ''password'' => ''admin''\n        ''rememberMe'' => ''1''\n    ]\n    ''login-button'' => ''''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''565c455394720f051d0812c0ff626b7be971cf2615f517500ac81fcb15231889a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"DQ5CqORBAhwbb__rDiwoF3ud1Q1klxx_\\";}''\n    ''PHPSESSID'' => ''ffs5cdgmdq4equbrono3vmbp86''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__returnUrl'' => ''/''\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''CONTENT_LENGTH'' => ''196''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_ORIGIN'' => ''http://backend.dev''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''CONTENT_TYPE'' => ''application/x-www-form-urlencoded''\n    ''HTTP_REFERER'' => ''http://backend.dev/site/login''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=565c455394720f051d0812c0ff626b7be971cf2615f517500ac81fcb15231889a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22DQ5CqORBAhwbb__rDiwoF3ud1Q1klxx_%22%3B%7D; PHPSESSID=ffs5cdgmdq4equbrono3vmbp86''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''64578''\n    ''REDIRECT_URL'' => ''http://backend.dev/site/login''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''POST''\n    ''QUERY_STRING'' => ''''\n    ''REQUEST_URI'' => ''/site/login''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1457911409.807\n    ''REQUEST_TIME'' => 1457911409\n]');

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1454289817),
('m130524_201442_init', 1454289820),
('m140506_102106_rbac_init', 1454377894),
('m141106_185632_log_init', 1455416254);

-- --------------------------------------------------------

--
-- 表的结构 `nodes`
--

CREATE TABLE `nodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `pos` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `attr_group_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `flow_group_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `path` varchar(100) NOT NULL,
  `article_t_path` varchar(255) NOT NULL DEFAULT '',
  `index_t_path` varchar(255) NOT NULL DEFAULT '',
  `cover_t_path` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `nodes`
--

INSERT INTO `nodes` (`id`, `pid`, `name`, `description`, `pos`, `type`, `attr_group_id`, `flow_group_id`, `path`, `article_t_path`, `index_t_path`, `cover_t_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, '根节点', '初始根节点', 1, 1, 0, 0, 'root', 'ArticleTpl', 'IndexTpl', 'CoverTpl', 1, 1456314502, 1456541383),
(2, 1, '新闻中心', 'xxx', 1, 2, 0, 0, 'news', '', '', '', 1, 1456402113, 1456402113),
(3, 2, '头条', '', 1, 2, 0, 0, 'topnews', '', '', '', 1, 1456541984, 1456541984),
(4, 1, '新节点', '', 1, 2, 0, 0, 'new', '', '', '', 1, 1457855929, 1457855929);

-- --------------------------------------------------------

--
-- 表的结构 `node_attr_group`
--

CREATE TABLE `node_attr_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL,
  `attr_group_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `node_attr_group`
--

INSERT INTO `node_attr_group` (`id`, `node_id`, `attr_group_id`, `created_at`) VALUES
(7, 1, 1, 1457268780);

-- --------------------------------------------------------

--
-- 表的结构 `operations_log`
--

CREATE TABLE `operations_log` (
  `id` bigint(20) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_time` double DEFAULT NULL,
  `prefix` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `operations_log`
--

INSERT INTO `operations_log` (`id`, `level`, `category`, `log_time`, `prefix`, `message`) VALUES
(1, 4, 'operations', 1455449113.6005, '[127.0.0.1][1][-]', '访问用户列表页'),
(2, 4, 'operations', 1455450388.5138, '[127.0.0.1][1][-]', '访问用户列表页'),
(3, 4, 'operations', 1455450586.9198, '[127.0.0.1][1][-]', 'visit authItem list page'),
(4, 4, 'operations', 1455453563.8317, '[127.0.0.1][1][-]', 'visit authItem list page'),
(5, 4, 'operations', 1455453596.3708, '[127.0.0.1][1][-]', 'visit authItem list page'),
(6, 4, 'operations', 1455461696.592, '[127.0.0.1][-][-]', '用户(username:admin) 退出登录状态'),
(7, 4, 'operations', 1455461705.2611, '[127.0.0.1][1][-]', '用户(username:admin) 登录成功'),
(8, 4, 'operations', 1455461734.9564, '[127.0.0.1][-][-]', '用户(username:admin) 退出登录状态'),
(9, 4, 'operations', 1455461743.6279, '[127.0.0.1][1][-]', '用户(username:admin) 登录成功'),
(10, 4, 'operations', 1455461765.2852, '[127.0.0.1][-][-]', '用户(username:admin) 退出登录状态'),
(11, 2, 'operations', 1455461773.4806, '[127.0.0.1][-][-]', 'login error(username:admin) password:admin888'),
(12, 4, 'operations', 1455461783.6948, '[127.0.0.1][1][-]', '用户(username:admin) 登录成功'),
(13, 4, 'operations', 1455461903.7913, '[127.0.0.1][-][-]', '用户(username:admin) 退出登录状态'),
(14, 4, 'operations', 1455461910.5462, '[127.0.0.1][1][-]', '用户(username:admin) 登录成功'),
(15, 4, 'operations', 1455461979.311, '[127.0.0.1][-][-]', '用户(username:admin) 退出登录状态'),
(16, 4, 'operations', 1455461987.6102, '[127.0.0.1][1][-]', '用户(username:admin) 登录成功'),
(17, 4, 'operations', 1455525890.5821, '[127.0.0.1][1][-]', '访问用户列表页'),
(18, 4, 'operations', 1455525902.5795, '[127.0.0.1][1][-]', 'visit authItem list page'),
(19, 4, 'operations', 1455525913.0082, '[127.0.0.1][1][-]', 'visit authItem list page'),
(20, 4, 'operations', 1455695863.3403, '[127.0.0.1][1][-]', '访问用户列表页'),
(21, 4, 'operations', 1455695869.5555, '[127.0.0.1][1][-]', 'visit authItem list page'),
(22, 4, 'operations', 1455695872.4455, '[127.0.0.1][1][-]', '访问用户列表页'),
(23, 4, 'operations', 1455868358.1339, '[127.0.0.1][1][-]', '访问用户列表页'),
(24, 4, 'operations', 1456032674.0912, '[127.0.0.1][1][-]', '访问用户列表页'),
(25, 4, 'operations', 1456109900.2953, '[127.0.0.1][1][-]', '访问用户列表页'),
(26, 4, 'operations', 1456110654.2427, '[127.0.0.1][1][-]', '访问用户列表页'),
(27, 4, 'operations', 1456110662.6932, '[127.0.0.1][1][-]', '访问用户列表页'),
(28, 4, 'operations', 1456190727.3295, '[127.0.0.1][1][-]', '访问用户列表页'),
(31, 4, 'operations', 1456195016.9977, '[127.0.0.1][1][-]', '访问用户列表页'),
(41, 4, 'operations', 1456196703.3429, '[127.0.0.1][1][-]', '访问用户列表页'),
(43, 4, 'operations', 1456196715.1299, '[127.0.0.1][1][-]', '访问用户列表页'),
(45, 4, 'operations', 1456196837.1312, '[127.0.0.1][1][-]', '给用户(user_id:1)赋权'),
(46, 4, 'operations', 1456196844.9975, '[127.0.0.1][1][-]', '给用户(user_id:1)赋权'),
(47, 4, 'operations', 1456196853.7302, '[127.0.0.1][1][epbk2ec6v4dg0lin3stmivjko0]', '给用户(user_id:1)赋权'),
(48, 4, 'operations', 1456196902.2659, '[127.0.0.1][1][-]', '给用户(user_id:1)赋权'),
(49, 4, 'operations', 1456196906.9167, '[127.0.0.1][1][-]', '给用户(user_id:1)赋权'),
(50, 4, 'operations', 1456196910.137, '[127.0.0.1][1][-]', '给用户(user_id:1)赋权'),
(51, 4, 'operations', 1456196936.5921, '[127.0.0.1][1][-]', '访问用户列表页'),
(52, 4, 'operations', 1456206149.3578, '[127.0.0.1][1][-]', 'visit authItem list page'),
(53, 4, 'operations', 1456206176.2577, '[127.0.0.1][1][-]', 'visit authItem list page'),
(54, 4, 'operations', 1456206179.0763, '[127.0.0.1][1][-]', 'visit authItem list page'),
(55, 4, 'operations', 1456206192.3628, '[127.0.0.1][1][-]', 'Create module(module name:userGroupManage)'),
(56, 4, 'operations', 1456206196.3919, '[127.0.0.1][1][-]', '访问用户列表页'),
(57, 4, 'operations', 1456206198.6536, '[127.0.0.1][1][-]', 'visit authItem list page'),
(58, 4, 'operations', 1456206209.0383, '[127.0.0.1][1][-]', 'Add Module to role(role name:admin)'),
(59, 4, 'operations', 1456211354.9285, '[127.0.0.1][1][-]', '访问用户列表页'),
(60, 4, 'operations', 1456554176.2591, '[127.0.0.1][1][-]', '访问用户列表页'),
(61, 4, 'operations', 1456554212.797, '[127.0.0.1][1][-]', '访问用户列表页'),
(62, 4, 'operations', 1456631617.1561, '[127.0.0.1][1][-]', 'visit authItem list page'),
(63, 4, 'operations', 1456638767.0123, '[127.0.0.1][1][-]', 'visit authItem list page'),
(64, 4, 'operations', 1457148489.9942, '[127.0.0.1][1][-]', '访问用户列表页'),
(65, 4, 'operations', 1457227830.2638, '[127.0.0.1][1][-]', 'visit authItem list page'),
(66, 4, 'operations', 1457227833.1333, '[127.0.0.1][1][-]', '访问用户列表页'),
(67, 4, 'operations', 1457853168.0502, '[127.0.0.1][1][-]', 'visit authItem list page'),
(68, 4, 'operations', 1457853188.576, '[127.0.0.1][1][-]', 'Create module(module name:attrModule)'),
(69, 4, 'operations', 1457853191.1663, '[127.0.0.1][1][-]', 'visit authItem list page'),
(70, 4, 'operations', 1457853200.9076, '[127.0.0.1][1][-]', 'visit authItem list page'),
(71, 4, 'operations', 1457853248.3056, '[127.0.0.1][1][-]', 'Create module(module name:nodeModule)'),
(72, 4, 'operations', 1457853255.9641, '[127.0.0.1][1][-]', 'visit authItem list page'),
(73, 4, 'operations', 1457853263.8299, '[127.0.0.1][1][-]', 'Create module(module name:contentModule)'),
(74, 2, 'operations', 1457853266.5019, '[127.0.0.1][1][-]', 'user(username:admin) visit unauthorized web page(requestedRoute:nodes/index,defined moduleName:nodeModule)'),
(75, 4, 'operations', 1457853271.1689, '[127.0.0.1][1][-]', 'visit authItem list page'),
(76, 4, 'operations', 1457853273.1068, '[127.0.0.1][1][-]', '访问用户列表页'),
(77, 4, 'operations', 1457853281.5443, '[127.0.0.1][1][-]', '访问用户列表页'),
(78, 4, 'operations', 1457853286.6716, '[127.0.0.1][1][-]', 'visit authItem list page'),
(79, 4, 'operations', 1457853293.998, '[127.0.0.1][1][-]', 'Add Module to role(role name:admin)'),
(80, 4, 'operations', 1457853297.4319, '[127.0.0.1][1][-]', '访问用户列表页'),
(81, 2, 'operations', 1457855140.7366, '[127.0.0.1][1][-]', 'user(username:admin) visit unauthorized web page(requestedRoute:attr-group/index,defined moduleName:attrGroupModule)'),
(82, 4, 'operations', 1457855161.1959, '[127.0.0.1][1][-]', 'visit authItem list page'),
(83, 4, 'operations', 1457855167.6944, '[127.0.0.1][1][-]', '访问用户列表页'),
(84, 4, 'operations', 1457855171.4435, '[127.0.0.1][1][-]', 'visit authItem list page'),
(85, 2, 'operations', 1457855179.2467, '[127.0.0.1][1][-]', 'user(username:admin) visit unauthorized web page(requestedRoute:attr-group/index,defined moduleName:attrGroupModule)'),
(86, 4, 'operations', 1457855800.2253, '[127.0.0.1][1][-]', 'visit authItem list page'),
(87, 4, 'operations', 1457855822.3813, '[127.0.0.1][1][-]', '访问用户列表页'),
(88, 4, 'operations', 1457855828.6686, '[127.0.0.1][1][-]', '删除用户(user_id:3)'),
(89, 4, 'operations', 1457855828.8505, '[127.0.0.1][1][-]', '访问用户列表页'),
(90, 4, 'operations', 1457855892.142, '[127.0.0.1][1][-]', 'Delete userGroup(userGroup name:小分组)'),
(91, 4, 'operations', 1457855929.4001, '[127.0.0.1][1][-]', 'Create node(node name:新节点)'),
(92, 4, 'operations', 1457856380.8763, '[127.0.0.1][1][-]', '新建了内容(内容标题:新文章测试,内容ID:2)'),
(93, 4, 'operations', 1457856381.0668, '[127.0.0.1][1][-]', 'View Content(Content title:新文章测试)'),
(94, 4, 'operations', 1457856846.4496, '[127.0.0.1][1][-]', '删除文章(文章标题:{ContentTitle},文章id:2)'),
(95, 2, 'operations', 1457856915.654, '[127.0.0.1][1][-]', '用户(username:admin) 访问了未授权的页面(requestedRoute:content/index,defined moduleName:content2Module)'),
(96, 4, 'operations', 1457911401.3501, '[127.0.0.1][-][-]', '用户(username:admin) 退出登录状态'),
(97, 2, 'operations', 1457911410.4929, '[127.0.0.1][-][-]', '登录错误(username:admin) password:admin'),
(98, 4, 'operations', 1457911415.2494, '[127.0.0.1][1][-]', '用户(username:admin) 登录成功'),
(99, 4, 'operations', 1457924701.8465, '[127.0.0.1][1][-]', '查看授权项列表页');

-- --------------------------------------------------------

--
-- 表的结构 `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `relate_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `url_hash` char(32) NOT NULL,
  `url_type` tinyint(3) UNSIGNED NOT NULL COMMENT '1,article;2,index;3,cover',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `url`
--

INSERT INTO `url` (`id`, `relate_id`, `url`, `url_hash`, `url_type`, `created_at`) VALUES
(1, 1, 'first-artcle', '09fdb3c3393a863a782b68b0542746a0', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'T9XOmLGuF1aPukYND0MM1OWqKup8LSN7', '$2y$13$g4ZPXlWftVRZC8/bC6.BI.NuVCehsWCpuDjT06upkZ3.ETzdEv0u6', NULL, 'admin@cpd.com.cn', 10, 1454295572, 1455461974),
(2, 'admin1', 'bCJ8TDy92N9fnGk5J-1OYGu1OMCHzFg6', '$2y$13$/f9HlkPVvRg.luiwJu2HE.D12cz4nbKp3ZZL.QHJw8x8gdIJfJ3VW', NULL, 'admin1@admin.com', 10, 1454308192, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user_group`
--

CREATE TABLE `user_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  `pos` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_group`
--

INSERT INTO `user_group` (`id`, `pid`, `name`, `description`, `created_at`, `updated_at`, `pos`, `status`) VALUES
(1, 0, '新闻中心', '新闻中心的编辑组', 1455589647, 0, 1, 1),
(9, 0, '大案要案', '', 1456211459, 0, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_group_assign`
--

CREATE TABLE `user_group_assign` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_group_assign`
--

INSERT INTO `user_group_assign` (`user_id`, `group_id`, `created_at`) VALUES
(1, 1, 1456196910);

-- --------------------------------------------------------

--
-- 表的结构 `user_group_node`
--

CREATE TABLE `user_group_node` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_group_id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_group_node`
--

INSERT INTO `user_group_node` (`id`, `user_group_id`, `node_id`, `created_at`) VALUES
(4, 15, 2, 1456632274);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attrs`
--
ALTER TABLE `attrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attr_group`
--
ALTER TABLE `attr_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attr_group_assign`
--
ALTER TABLE `attr_group_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_attr`
--
ALTER TABLE `content_attr`
  ADD PRIMARY KEY (`content_id`),
  ADD UNIQUE KEY `content_id` (`content_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_log_level` (`level`),
  ADD KEY `idx_log_category` (`category`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `node_attr_group`
--
ALTER TABLE `node_attr_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations_log`
--
ALTER TABLE `operations_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_log_level` (`level`),
  ADD KEY `idx_log_category` (`category`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_hash` (`url_hash`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_node`
--
ALTER TABLE `user_group_node`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `attrs`
--
ALTER TABLE `attrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `attr_group`
--
ALTER TABLE `attr_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `attr_group_assign`
--
ALTER TABLE `attr_group_assign`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `nodes`
--
ALTER TABLE `nodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `node_attr_group`
--
ALTER TABLE `node_attr_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `operations_log`
--
ALTER TABLE `operations_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- 使用表AUTO_INCREMENT `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `user_group_node`
--
ALTER TABLE `user_group_node`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
