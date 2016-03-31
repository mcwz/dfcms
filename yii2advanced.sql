-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-03-31 11:21:54
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
(10, 2, 1, 1457245503),
(11, 1, 2, 1459408272);

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
-- 表的结构 `cache`
--

CREATE TABLE `cache` (
  `id` char(128) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cache`
--

INSERT INTO `cache` (`id`, `expire`, `data`) VALUES
('4f275d4af85e22e6472236767386681f', 0, 0x613a323a7b693a303b733a3336363a225b7b226964223a2232222c22706964223a2231222c226e616d65223a225c75363562305c75393566625c75346532645c75356663336e6577222c2275726c223a22696e6465783f6e6f646569643d32222c22746172676574223a225f73656c66227d2c7b226964223a2233222c22706964223a2232222c226e616d65223a225c75353933345c7536373631222c2275726c223a22696e6465783f6e6f646569643d33222c22746172676574223a225f73656c66227d2c7b226964223a2234222c22706964223a2232222c226e616d65223a225c75383938315c7539356662222c2275726c223a22696e6465783f6e6f646569643d34222c22746172676574223a225f73656c66227d2c7b226964223a2231222c22706964223a2231222c226e616d65223a225c75363833395c75373665655c7535663535222c2275726c223a22696e6465783f6e6f646569643d31222c22746172676574223a225f73656c66222c226f70656e223a747275657d5d223b693a313b4e3b7d);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `pos` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `attr_group_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `check_group_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `path` varchar(100) NOT NULL DEFAULT '',
  `article_t_path` varchar(255) NOT NULL DEFAULT '',
  `index_t_path` varchar(255) NOT NULL DEFAULT '',
  `cover_t_path` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `pos`, `type`, `attr_group_id`, `check_group_id`, `path`, `article_t_path`, `index_t_path`, `cover_t_path`, `status`, `created_at`, `updated_at`) VALUES
(1, '根目录', '根目录', 1, 1, 0, 0, '', '', '', '', 1, 1, 1),
(2, '新闻中心new', '新闻中心', 1, 1, 0, 0, '', '', '', '', 1, 1459321730, 1459321730),
(3, '头条', '头条', 1, 2, 0, 0, 'top', '', '', '', 1, 1459321743, 1459321743),
(4, '要闻', '要闻', 1, 2, 0, 0, 'imp', '', '', '', 1, 1459321757, 1459321757),
(5, '大案要案', '大案要案', 1, 2, 0, 0, '', '', '', '', 1, 1459321769, 1459321769),
(6, '女警', '女警', 1, 1, 0, 0, '', '', '', '', 1, 1459321779, 1459321779);

-- --------------------------------------------------------

--
-- 表的结构 `category_treepaths`
--

CREATE TABLE `category_treepaths` (
  `ancestor` int(11) UNSIGNED NOT NULL,
  `descendant` int(11) UNSIGNED NOT NULL,
  `path_length` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category_treepaths`
--

INSERT INTO `category_treepaths` (`ancestor`, `descendant`, `path_length`) VALUES
(1, 1, 0),
(1, 2, 1),
(1, 3, 2),
(1, 4, 2),
(1, 5, 1),
(1, 6, 1),
(2, 2, 0),
(2, 3, 1),
(2, 4, 1),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0);

-- --------------------------------------------------------

--
-- 表的结构 `checking`
--

CREATE TABLE `checking` (
  `id` int(10) UNSIGNED NOT NULL,
  `check_step_user_id` int(10) UNSIGNED NOT NULL COMMENT 'Check Step User Table ID',
  `step` tinyint(3) UNSIGNED NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `check_step_id` int(10) UNSIGNED NOT NULL,
  `checked` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `checked_time` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `checking`
--

INSERT INTO `checking` (`id`, `check_step_user_id`, `step`, `type`, `user_id`, `check_step_id`, `checked`, `checked_time`, `content_id`, `created_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, 5, 1458979949),
(2, 2, 2, 2, 1, 2, 1, 0, 5, 1458979949),
(3, 3, 2, 2, 2, 2, 1, 0, 5, 1458979949),
(4, 4, 3, 1, 1, 3, 1, 0, 5, 1458979949),
(5, 5, 3, 1, 2, 3, 1, 0, 5, 1458979949),
(6, 6, 4, 1, 2, 4, 1, 0, 5, 1458979949),
(7, 1, 1, 1, 2, 1, 1, 0, 6, 1458982233),
(8, 2, 2, 2, 1, 2, 1, 0, 6, 1458982233),
(9, 3, 2, 2, 2, 2, 1, 0, 6, 1458982233),
(10, 4, 3, 2, 1, 3, 1, 0, 6, 1458982233),
(11, 5, 3, 2, 2, 3, 1, 0, 6, 1458982233),
(12, 6, 4, 1, 2, 4, 1, 0, 6, 1458982233),
(13, 1, 1, 1, 2, 1, 1, 0, 7, 1458982277),
(14, 2, 2, 2, 1, 2, 1, 0, 7, 1458982277),
(15, 3, 2, 2, 2, 2, 1, 0, 7, 1458982277),
(16, 4, 3, 2, 1, 3, 1, 0, 7, 1458982277),
(17, 5, 3, 2, 2, 3, 1, 0, 7, 1458982277),
(18, 6, 4, 1, 2, 4, 1, 0, 7, 1458982277),
(19, 1, 1, 1, 2, 1, 1, 0, 8, 1458982651),
(20, 2, 2, 2, 1, 2, 1, 0, 8, 1458982651),
(21, 3, 2, 2, 2, 2, 1, 0, 8, 1458982651),
(22, 4, 3, 2, 1, 3, 1, 0, 8, 1458982651),
(23, 5, 3, 2, 2, 3, 1, 0, 8, 1458982651),
(24, 6, 4, 1, 2, 4, 1, 0, 8, 1458982651),
(25, 1, 1, 1, 2, 1, 1, 0, 9, 1458983295),
(26, 2, 2, 2, 1, 2, 1, 0, 9, 1458983295),
(27, 3, 2, 2, 2, 2, 1, 0, 9, 1458983295),
(28, 4, 3, 2, 1, 3, 1, 0, 9, 1458983295),
(29, 5, 3, 2, 2, 3, 1, 0, 9, 1458983295),
(30, 6, 4, 1, 2, 4, 1, 0, 9, 1458983295);

-- --------------------------------------------------------

--
-- 表的结构 `check_group`
--

CREATE TABLE `check_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `step_count` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `check_group`
--

INSERT INTO `check_group` (`id`, `name`, `step_count`, `created_at`, `updated_at`) VALUES
(1, '新闻中心审核', 4, 1458525150, 1458525385);

-- --------------------------------------------------------

--
-- 表的结构 `check_log`
--

CREATE TABLE `check_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `checking_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `check_log`
--

INSERT INTO `check_log` (`id`, `user_id`, `checking_id`, `content_id`, `created_at`) VALUES
(1, 2, 19, 8, 1458982677),
(2, 2, 21, 8, 1458982677),
(3, 2, 23, 8, 1458982677),
(4, 2, 24, 8, 1458982677),
(5, 2, 25, 9, 1458983295),
(6, 2, 27, 9, 1458983295),
(7, 2, 29, 9, 1458983295),
(8, 2, 30, 9, 1458983295);

-- --------------------------------------------------------

--
-- 表的结构 `check_step`
--

CREATE TABLE `check_step` (
  `id` int(10) UNSIGNED NOT NULL,
  `step` tinyint(3) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL COMMENT '1,union check;2,Non union chek',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `check_step`
--

INSERT INTO `check_step` (`id`, `step`, `group_id`, `type`, `created_at`) VALUES
(1, 1, 1, 1, 1458629305),
(2, 2, 1, 2, 1458630191),
(3, 3, 1, 2, 1458630227),
(4, 4, 1, 1, 1458630820);

-- --------------------------------------------------------

--
-- 表的结构 `check_step_user`
--

CREATE TABLE `check_step_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `step_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `check_step_user`
--

INSERT INTO `check_step_user` (`id`, `step_id`, `user_id`, `created_at`) VALUES
(1, 1, 2, 1458629305),
(2, 2, 1, 1458630191),
(3, 2, 2, 1458630191),
(4, 3, 1, 1458630227),
(5, 3, 2, 1458630227),
(6, 4, 2, 1458630820);

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
(1, '新', 'ccccc7ddd', 1, 'admin', 3, 1457771188, 1457790258, 3),
(2, '弟弟的', '偷偷偷', 1, 'admin', 1, 1458458517, 1458458517, 3),
(3, '弟弟的', '翡翠城', 1, 'admin', 1, 1458458553, 1458458553, 3),
(4, '发送的', '发', 1, 'admin', 1, 1458461591, 1458461591, 3),
(5, '审核测试', '', 1, 'admin', 1, 1458864600, 1458864600, 5),
(6, 'x', '', 2, 'admin1', 1, 1458982221, 1458982221, 5),
(7, '有', '', 1, 'admin', 1, 1458982270, 1458982270, 5),
(8, 'fds', '', 1, 'admin', 1, 1458982645, 1458982645, 5),
(9, 'xxx', '', 1, 'admin', 1, 1458983272, 1458983272, 5);

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
(2, '<p>达到</p>', '{"content_attr": "{\\"bt\\":\\"\\\\u7684\\",\\"btx\\":\\"\\\\u7684\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "的", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "的", "created_at": "1457175722", "updated_at": "1457175722"}]}'),
(3, '<p>妇产</p>', '{"content_attr": "{\\"bt\\":\\"\\\\u7ed9\\\\u7684\\\\u5206\\",\\"btx\\":\\"\\\\u7ed9\\\\u7684\\\\u5206\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "给的分", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "给的分", "created_at": "1457175722", "updated_at": "1457175722"}]}'),
(4, '<p>&nbsp;风 &nbsp;风格是格</p>', '{"content_attr": "{\\"bt\\":\\"\\\\u53d1\\",\\"btx\\":\\"\\\\u521a\\\\u521a\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "发", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "刚刚", "created_at": "1457175722", "updated_at": "1457175722"}]}'),
(5, '<p>审核测试</p>', '{"content_attr": "{\\"bt\\":\\"\\\\u5ba1\\\\u6838\\\\u6d4b\\\\u8bd51\\",\\"btx\\":\\"\\\\u5ba1\\\\u6838\\\\u6d4b\\\\u8bd52\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "审核测试1", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "审核测试2", "created_at": "1457175722", "updated_at": "1457175722"}]}'),
(6, '<p>x</p>', '{"content_attr": "{\\"bt\\":\\"x\\",\\"btx\\":\\"x\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "x", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "x", "created_at": "1457175722", "updated_at": "1457175722"}]}'),
(7, '<p>个</p>', '{"content_attr": "{\\"bt\\":\\"\\\\u65b9\\\\u5f0f\\",\\"btx\\":\\" \\\\u53d1\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "方式", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": " 发", "created_at": "1457175722", "updated_at": "1457175722"}]}'),
(8, '<p>dfs</p>', '{"content_attr": "{\\"bt\\":\\"fds\\",\\"btx\\":\\"dfsa\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "fds", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "dfsa", "created_at": "1457175722", "updated_at": "1457175722"}]}'),
(9, '<p>xxxx</p>', '{"content_attr": "{\\"bt\\":\\"xx\\",\\"btx\\":\\"xx\\"}", "attr_data_model": [{"id": "1", "name": "bt", "type": "1", "label": "标题", "rules": "required", "value": "xx", "created_at": "1457175722", "updated_at": "1457175722"}, {"id": "2", "name": "btx", "type": "1", "label": "标题1", "rules": "required", "value": "xx", "created_at": "1457175722", "updated_at": "1457175722"}]}');

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
(1, 1, 'yii\\base\\ErrorException:4', 1459342092.6399, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''syntax error, unexpected ''}'''' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\models\\UserGroup.php:122\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}'),
(2, 4, 'application', 1459342092.4941, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_GET = [\n    ''id'' => ''1''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/user-manage/index''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''54330''\n    ''REDIRECT_QUERY_STRING'' => ''id=1''\n    ''REDIRECT_URL'' => ''http://backend.dev/user-manage/authorize?id=1''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''id=1''\n    ''REQUEST_URI'' => ''/user-manage/authorize?id=1''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459342092.487\n    ''REQUEST_TIME'' => 1459342092\n]'),
(3, 1, 'yii\\base\\ErrorException:1', 1459347395.4447, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''Call to undefined function yii\\caching\\apc_fetch()'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\caching\\ApcCache.php:48\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}'),
(4, 4, 'application', 1459347395.2328, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/user-group/index''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''54872''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/index''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''''\n    ''REQUEST_URI'' => ''/content/index''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459347395.211\n    ''REQUEST_TIME'' => 1459347395\n]'),
(5, 1, 'yii\\base\\ErrorException:1', 1459347806.2018, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''Call to undefined function yii\\caching\\apc_fetch()'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\caching\\ApcCache.php:48\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}'),
(6, 4, 'application', 1459347805.955, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/user-group/index''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''55128''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/index''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''''\n    ''REQUEST_URI'' => ''/content/index''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459347805.93\n    ''REQUEST_TIME'' => 1459347805\n]'),
(7, 1, 'yii\\db\\Exception', 1459347874.479, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''PDOException'' with message ''SQLSTATE[42S02]: Base table or view not found: 1146 Table ''yii2advanced.cache'' doesn''t exist'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php:837\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php(837): PDOStatement->execute()\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php(385): yii\\db\\Command->queryInternal(''<span class="st...'', ''<span class="nu...'')\n#2 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\caching\\DbCache.php(133): yii\\db\\Command->queryScalar()\n#3 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\caching\\Cache.php(104): yii\\caching\\DbCache->getValue(''<span class="st...'')\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\models\\Category.php(191): yii\\caching\\Cache->get(''<span class="st...'')\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php(63): backend\\models\\Category::getCategoryByUser(''<span class="nu...'')\n#6 [internal function]: backend\\controllers\\ContentController->actionIndex(''<span class="nu...'')\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(55): call_user_func_array(''[<span class="t...'', ''[<span class="n...'')\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(151): yii\\base\\InlineAction->runWithParams(''[]'')\n#9 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''<span class="st...'', ''[]'')\n#10 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''<span class="st...'', ''[]'')\n#11 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#13 {main}\n\nNext exception ''yii\\db\\Exception'' with message ''SQLSTATE[42S02]: Base table or view not found: 1146 Table ''yii2advanced.cache'' doesn''t exist\nThe SQL being executed was: SELECT `data` FROM `cache` WHERE `id` = ''4f275d4af85e22e6472236767386681f'' AND (`expire` = 0 OR `expire` >1459347874)'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Schema.php:628\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php(852): yii\\db\\Schema->convertException(Object(PDOException), ''SELECT `data` F...'')\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php(385): yii\\db\\Command->queryInternal(''<span class="st...'', ''<span class="nu...'')\n#2 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\caching\\DbCache.php(133): yii\\db\\Command->queryScalar()\n#3 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\caching\\Cache.php(104): yii\\caching\\DbCache->getValue(''<span class="st...'')\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\models\\Category.php(191): yii\\caching\\Cache->get(''<span class="st...'')\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php(63): backend\\models\\Category::getCategoryByUser(''<span class="nu...'')\n#6 [internal function]: backend\\controllers\\ContentController->actionIndex(''<span class="nu...'')\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(55): call_user_func_array(''[<span class="t...'', ''[<span class="n...'')\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(151): yii\\base\\InlineAction->runWithParams(''[]'')\n#9 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''<span class="st...'', ''[]'')\n#10 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''<span class="st...'', ''[]'')\n#11 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#13 {main}\r\nAdditional Information:\r\nArray\n(\n    [0] => 42S02\n    [1] => 1146\n    [2] => Table ''yii2advanced.cache'' doesn''t exist\n)\n'),
(8, 4, 'application', 1459347874.35, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/user-group/index''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''55138''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/index''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''''\n    ''REQUEST_URI'' => ''/content/index''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459347874.339\n    ''REQUEST_TIME'' => 1459347874\n]'),
(9, 1, 'yii\\base\\ErrorException:8', 1459407943.4589, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''Undefined index: group_id'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\models\\Category.php:244\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\models\\Category.php(244): yii\\base\\ErrorHandler->handleError(8, ''Undefined index...'', ''E:\\\\workspace\\\\ph...'', 244, Array)\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\models\\Category.php(267): backend\\models\\Category::getAssignedAttrGroup(''3'')\n#2 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php(114): backend\\models\\Category::getAssignedAttrByCategory(''3'')\n#3 [internal function]: backend\\controllers\\ContentController->actionCreate(''3'')\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(55): call_user_func_array(Array, Array)\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(151): yii\\base\\InlineAction->runWithParams(Array)\n#6 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''create'', Array)\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''content/create'', Array)\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#9 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#10 {main}'),
(10, 4, 'application', 1459407943.3723, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_GET = [\n    ''nodeid'' => ''3''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/create?nodeid=1''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''61045''\n    ''REDIRECT_QUERY_STRING'' => ''nodeid=3''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/create?nodeid=3''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''nodeid=3''\n    ''REQUEST_URI'' => ''/content/create?nodeid=3''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459407943.362\n    ''REQUEST_TIME'' => 1459407943\n]'),
(11, 1, 'yii\\base\\ErrorException:8', 1459407997.5499, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''Trying to get property of non-object'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\models\\Category.php:270\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\models\\Category.php(270): yii\\base\\ErrorHandler->handleError(8, ''Trying to get p...'', ''E:\\\\workspace\\\\ph...'', 270, Array)\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php(114): backend\\models\\Category::getAssignedAttrByCategory(''3'')\n#2 [internal function]: backend\\controllers\\ContentController->actionCreate(''3'')\n#3 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(55): call_user_func_array(Array, Array)\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(151): yii\\base\\InlineAction->runWithParams(Array)\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''create'', Array)\n#6 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''content/create'', Array)\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#9 {main}'),
(12, 4, 'application', 1459407997.4387, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_GET = [\n    ''nodeid'' => ''3''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/create?nodeid=1''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''61049''\n    ''REDIRECT_QUERY_STRING'' => ''nodeid=3''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/create?nodeid=3''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''nodeid=3''\n    ''REQUEST_URI'' => ''/content/create?nodeid=3''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459407997.427\n    ''REQUEST_TIME'' => 1459407997\n]'),
(13, 1, 'yii\\base\\ErrorException:1', 1459408850.3612, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''Class ''backend\\models\\Nodes'' not found'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php:106\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}'),
(14, 4, 'application', 1459408850.2355, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_GET = [\n    ''nodeid'' => ''2''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/create?nodeid=3''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''61292''\n    ''REDIRECT_QUERY_STRING'' => ''nodeid=2''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/create?nodeid=2''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''nodeid=2''\n    ''REQUEST_URI'' => ''/content/create?nodeid=2''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459408850.224\n    ''REQUEST_TIME'' => 1459408850\n]'),
(15, 1, 'yii\\base\\ErrorException:1', 1459408925.0974, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''Class ''backend\\models\\Nodes'' not found'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\services\\url\\UrlGenerator.php:20\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}'),
(16, 4, 'application', 1459408924.9963, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_GET = [\n    ''nodeid'' => ''2''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/create?nodeid=3''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''61302''\n    ''REDIRECT_QUERY_STRING'' => ''nodeid=2''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/create?nodeid=2''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''nodeid=2''\n    ''REQUEST_URI'' => ''/content/create?nodeid=2''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459408924.987\n    ''REQUEST_TIME'' => 1459408924\n]'),
(17, 1, 'yii\\base\\ErrorException:1', 1459409344.7506, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''Class ''backend\\models\\Nodes'' not found'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php:84\nStack trace:\n#0 [internal function]: yii\\base\\ErrorHandler->handleFatalError()\n#1 {main}');
INSERT INTO `log` (`id`, `level`, `category`, `log_time`, `prefix`, `message`) VALUES
(18, 4, 'application', 1459409344.6821, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_GET = [\n    ''id'' => ''1''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/index''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''61365''\n    ''REDIRECT_QUERY_STRING'' => ''id=1''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/view?id=1''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''id=1''\n    ''REQUEST_URI'' => ''/content/view?id=1''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459409344.676\n    ''REQUEST_TIME'' => 1459409344\n]'),
(19, 1, 'yii\\base\\ErrorException:8', 1459409377.3924, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''yii\\base\\ErrorException'' with message ''Undefined variable: urlModel'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\views\\content\\_form.php:21\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\views\\content\\_form.php(21): yii\\base\\ErrorHandler->handleError(8, ''Undefined varia...'', ''E:\\\\workspace\\\\ph...'', 21, Array)\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\View.php(325): require(''E:\\\\workspace\\\\ph...'')\n#2 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\View.php(247): yii\\base\\View->renderPhpFile(''E:\\\\workspace\\\\ph...'', Array)\n#3 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\View.php(149): yii\\base\\View->renderFile(''E:\\\\workspace\\\\ph...'', Array, NULL)\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\views\\content\\update.php(33): yii\\base\\View->render(''_form'', Array)\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\View.php(325): require(''E:\\\\workspace\\\\ph...'')\n#6 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\View.php(247): yii\\base\\View->renderPhpFile(''E:\\\\workspace\\\\ph...'', Array)\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\View.php(149): yii\\base\\View->renderFile(''E:\\\\workspace\\\\ph...'', Array, Object(backend\\controllers\\ContentController))\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(371): yii\\base\\View->render(''update'', Array, Object(backend\\controllers\\ContentController))\n#9 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php(269): yii\\base\\Controller->render(''update'', Array)\n#10 [internal function]: backend\\controllers\\ContentController->actionUpdate(''1'')\n#11 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(55): call_user_func_array(Array, Array)\n#12 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(151): yii\\base\\InlineAction->runWithParams(Array)\n#13 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''update'', Array)\n#14 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''content/update'', Array)\n#15 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#16 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#17 {main}'),
(20, 4, 'application', 1459409377.2551, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_GET = [\n    ''id'' => ''1''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/view?id=1''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''61384''\n    ''REDIRECT_QUERY_STRING'' => ''id=1''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/update?id=1''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''id=1''\n    ''REQUEST_URI'' => ''/content/update?id=1''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459409377.245\n    ''REQUEST_TIME'' => 1459409377\n]'),
(21, 1, 'yii\\db\\Exception', 1459409720.6353, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', 'exception ''PDOException'' with message ''SQLSTATE[42S22]: Column not found: 1054 Unknown column ''releat_id'' in ''where clause'''' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php:837\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php(837): PDOStatement->execute()\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php(373): yii\\db\\Command->queryInternal(''<span class="st...'', ''<span class="ke...'')\n#2 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Query.php(243): yii\\db\\Command->queryOne()\n#3 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\ActiveQuery.php(300): yii\\db\\Query->one(''<span class="ke...'')\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(102): yii\\db\\ActiveQuery->one()\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php(214): yii\\db\\BaseActiveRecord::findOne(''[<span class="s...'')\n#6 [internal function]: backend\\controllers\\ContentController->actionUpdate(''<span class="st...'')\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(55): call_user_func_array(''[<span class="t...'', ''[<span class="s...'')\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(151): yii\\base\\InlineAction->runWithParams(''[<span class="s...'')\n#9 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''<span class="st...'', ''[<span class="s...'')\n#10 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''<span class="st...'', ''[<span class="s...'')\n#11 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#13 {main}\n\nNext exception ''yii\\db\\Exception'' with message ''SQLSTATE[42S22]: Column not found: 1054 Unknown column ''releat_id'' in ''where clause''\nThe SQL being executed was: SELECT * FROM `url` WHERE (`releat_id`=''1'') AND (`url_type`=1)'' in E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Schema.php:628\nStack trace:\n#0 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php(852): yii\\db\\Schema->convertException(Object(PDOException), ''SELECT * FROM `...'')\n#1 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Command.php(373): yii\\db\\Command->queryInternal(''<span class="st...'', ''<span class="ke...'')\n#2 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\Query.php(243): yii\\db\\Command->queryOne()\n#3 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\ActiveQuery.php(300): yii\\db\\Query->one(''<span class="ke...'')\n#4 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(102): yii\\db\\ActiveQuery->one()\n#5 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\controllers\\ContentController.php(214): yii\\db\\BaseActiveRecord::findOne(''[<span class="s...'')\n#6 [internal function]: backend\\controllers\\ContentController->actionUpdate(''<span class="st...'')\n#7 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(55): call_user_func_array(''[<span class="t...'', ''[<span class="s...'')\n#8 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Controller.php(151): yii\\base\\InlineAction->runWithParams(''[<span class="s...'')\n#9 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Module.php(455): yii\\base\\Controller->runAction(''<span class="st...'', ''[<span class="s...'')\n#10 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\web\\Application.php(84): yii\\base\\Module->runAction(''<span class="st...'', ''[<span class="s...'')\n#11 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\vendor\\yiisoft\\yii2\\base\\Application.php(375): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#12 E:\\workspace\\php\\vhosts\\127.0.1.1_cms\\backend\\web\\index.php(18): yii\\base\\Application->run()\n#13 {main}\r\nAdditional Information:\r\nArray\n(\n    [0] => 42S22\n    [1] => 1054\n    [2] => Unknown column ''releat_id'' in ''where clause''\n)\n'),
(22, 4, 'application', 1459409720.4874, '[127.0.0.1][1][1n4joqjreubh7jo8u2793cqno2]', '$_GET = [\n    ''id'' => ''1''\n]\n\n$_COOKIE = [\n    ''_csrf'' => ''6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a:2:{i:0;s:5:\\"_csrf\\";i:1;s:32:\\"obdBK6zOMX2xaHarB-FhkVkmvm3a3kah\\";}''\n    ''PHPSESSID'' => ''1n4joqjreubh7jo8u2793cqno2''\n    ''_identity'' => ''4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea:2:{i:0;s:9:\\"_identity\\";i:1;s:46:\\"[1,\\"T9XOmLGuF1aPukYND0MM1OWqKup8LSN7\\",2592000]\\";}''\n]\n\n$_SESSION = [\n    ''__flash'' => []\n    ''__id'' => 1\n]\n\n$_SERVER = [\n    ''REDIRECT_MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''REDIRECT_MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''REDIRECT_OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''REDIRECT_PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_PHPRC'' => ''\\\\xampp\\\\php''\n    ''REDIRECT_TMP'' => ''\\\\xampp\\\\tmp''\n    ''REDIRECT_STATUS'' => ''200''\n    ''MIBDIRS'' => ''D:/xampp5_6_19/php/extras/mibs''\n    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''\n    ''OPENSSL_CONF'' => ''D:/xampp5_6_19/apache/bin/openssl.cnf''\n    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''\n    ''PHPRC'' => ''\\\\xampp\\\\php''\n    ''TMP'' => ''\\\\xampp\\\\tmp''\n    ''HTTP_HOST'' => ''backend.dev''\n    ''HTTP_CONNECTION'' => ''keep-alive''\n    ''HTTP_CACHE_CONTROL'' => ''max-age=0''\n    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''\n    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''\n    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.82 Safari/537.36''\n    ''HTTP_REFERER'' => ''http://backend.dev/content/view?id=1''\n    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch''\n    ''HTTP_ACCEPT_LANGUAGE'' => ''zh-CN,zh;q=0.8''\n    ''HTTP_COOKIE'' => ''_csrf=6963aad8086314e8e588efbe82b804474510b9d193311a571d21a6c5f43e7bb0a%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22obdBK6zOMX2xaHarB-FhkVkmvm3a3kah%22%3B%7D; PHPSESSID=1n4joqjreubh7jo8u2793cqno2; _identity=4a2febc652f81b919b5c50e67940624817b23082c49a6ec9de30227fbff04eaea%3A2%3A%7Bi%3A0%3Bs%3A9%3A%22_identity%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22T9XOmLGuF1aPukYND0MM1OWqKup8LSN7%22%2C2592000%5D%22%3B%7D''\n    ''PATH'' => ''C:\\\\ProgramData\\\\Oracle\\\\Java\\\\javapath;C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:\\\\Program Files (x86)\\\\NVIDIA Corporation\\\\PhysX\\\\Common;C:\\\\WINDOWS\\\\system32;C:\\\\WINDOWS;C:\\\\WINDOWS\\\\System32\\\\Wbem;C:\\\\WINDOWS\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;D:\\\\xampp5_6_19\\\\php;C:\\\\ProgramData\\\\ComposerSetup\\\\bin;C:\\\\Program Files\\\\Intel\\\\WiFi\\\\bin\\\\;C:\\\\Program Files\\\\Common Files\\\\Intel\\\\WirelessCommon\\\\;C:/Users/sheldon/AppData/Roaming/Composer/vendor/bin''\n    ''SystemRoot'' => ''C:\\\\WINDOWS''\n    ''COMSPEC'' => ''C:\\\\WINDOWS\\\\system32\\\\cmd.exe''\n    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''\n    ''WINDIR'' => ''C:\\\\WINDOWS''\n    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19 Server at backend.dev Port 80</address>\n''\n    ''SERVER_SOFTWARE'' => ''Apache/2.4.17 (Win32) OpenSSL/1.0.2d PHP/5.6.19''\n    ''SERVER_NAME'' => ''backend.dev''\n    ''SERVER_ADDR'' => ''127.0.0.1''\n    ''SERVER_PORT'' => ''80''\n    ''REMOTE_ADDR'' => ''127.0.0.1''\n    ''DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''REQUEST_SCHEME'' => ''http''\n    ''CONTEXT_PREFIX'' => ''''\n    ''CONTEXT_DOCUMENT_ROOT'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web''\n    ''SERVER_ADMIN'' => ''webmaster@dummy-host2.example.com''\n    ''SCRIPT_FILENAME'' => ''E:/workspace/php/vhosts/127.0.1.1_cms/backend/web/index.php''\n    ''REMOTE_PORT'' => ''61456''\n    ''REDIRECT_QUERY_STRING'' => ''id=1''\n    ''REDIRECT_URL'' => ''http://backend.dev/content/update?id=1''\n    ''GATEWAY_INTERFACE'' => ''CGI/1.1''\n    ''SERVER_PROTOCOL'' => ''HTTP/1.1''\n    ''REQUEST_METHOD'' => ''GET''\n    ''QUERY_STRING'' => ''id=1''\n    ''REQUEST_URI'' => ''/content/update?id=1''\n    ''SCRIPT_NAME'' => ''/index.php''\n    ''PHP_SELF'' => ''/index.php''\n    ''REQUEST_TIME_FLOAT'' => 1459409720.476\n    ''REQUEST_TIME'' => 1459409720\n]');

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
  `check_group_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
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

INSERT INTO `nodes` (`id`, `pid`, `name`, `description`, `pos`, `type`, `attr_group_id`, `check_group_id`, `path`, `article_t_path`, `index_t_path`, `cover_t_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, '根节点', '初始根节点', 1, 1, 0, 1, 'root', 'ArticleTpl', 'IndexTpl', 'CoverTpl', 1, 1456314502, 1456541383),
(2, 1, '新闻中心', 'xxx', 1, 2, 0, 0, 'news', '', '', '', 1, 1456402113, 1456402113),
(3, 2, '头条', '', 1, 2, 0, 0, 'topnews', '', '', '', 1, 1456541984, 1456541984);

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
(1, 1, 1, 1459326244),
(2, 2, 2, 1459408308);

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
(1, 4, 'operations', 1459342086.7749, '[127.0.0.1][1][-]', '访问用户列表页'),
(2, 4, 'operations', 1459342108.5915, '[127.0.0.1][1][-]', '访问用户列表页'),
(3, 4, 'operations', 1459348390.0041, '[127.0.0.1][1][-]', '查看文章(文章标题:新)'),
(4, 4, 'operations', 1459348953.8312, '[127.0.0.1][1][-]', '查看文章(文章标题:弟弟的)'),
(5, 4, 'operations', 1459383517.7619, '[127.0.0.1][1][-]', '查看文章(文章标题:弟弟的)'),
(6, 4, 'operations', 1459408272.1665, '[127.0.0.1][1][-]', '把这些附加属性(属性id:["1"])加到属性组(组名:属性组2)'),
(7, 4, 'operations', 1459408308.3962, '[127.0.0.1][1][-]', 'Assign attrGroup(attrGroup id:{attr_group_id}) to node(category name:新闻中心new)'),
(8, 4, 'operations', 1459409375.5313, '[127.0.0.1][1][-]', '查看文章(文章标题:新)');

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
(1, 1, 'first-artcle', '09fdb3c3393a863a782b68b0542746a0', 1, 1),
(2, 2, '/2', 'de045d141a8b035fd6afde5a0c3a97e9', 1, 1458458517),
(3, 3, '/3', 'f95b09df4de35ea1c783c36887d22d02', 1, 1458458553),
(4, 4, '/4', '16e776ac8fdfc7df55e1eb6190703a9d', 1, 1458461591),
(5, 5, '/5', '85bc535fc0618afa3d0c437c3814fb1c', 1, 1458864600),
(6, 6, '/6', '7592574eaf4119053e29e248f92796bd', 1, 1458982221),
(7, 7, '/7', 'dd6f47fc3e40bd4348d939963a6f255a', 1, 1458982270),
(8, 8, '/8', '12e1d6adff6cbe8208f6920a47ebe0de', 1, 1458982645),
(9, 9, '/9', '4c63c3080d897bf194f65fd73fe6b030', 1, 1458983273);

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
(1, 'admin', 'T9XOmLGuF1aPukYND0MM1OWqKup8LSN7', '$2y$13$g4ZPXlWftVRZC8/bC6.BI.NuVCehsWCpuDjT06upkZ3.ETzdEv0u6', NULL, 'admin@cpd.com.cn', 10, 1454295572, 1458985888),
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
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_group_assign`
--

INSERT INTO `user_group_assign` (`id`, `user_id`, `group_id`, `created_at`) VALUES
(1, 1, 1, 1456196910);

-- --------------------------------------------------------

--
-- 表的结构 `user_group_node`
--

CREATE TABLE `user_group_node` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_group_id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL,
  `include_son` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_group_node`
--

INSERT INTO `user_group_node` (`id`, `user_group_id`, `node_id`, `include_son`, `created_at`) VALUES
(4, 1, 2, 1, 1456632274);

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
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_treepaths`
--
ALTER TABLE `category_treepaths`
  ADD PRIMARY KEY (`ancestor`,`descendant`),
  ADD KEY `descendant` (`descendant`);

--
-- Indexes for table `checking`
--
ALTER TABLE `checking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_group`
--
ALTER TABLE `check_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_log`
--
ALTER TABLE `check_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_step`
--
ALTER TABLE `check_step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_step_user`
--
ALTER TABLE `check_step_user`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_group_assign`
--
ALTER TABLE `user_group_assign`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `checking`
--
ALTER TABLE `checking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `check_group`
--
ALTER TABLE `check_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `check_log`
--
ALTER TABLE `check_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `check_step`
--
ALTER TABLE `check_step`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `check_step_user`
--
ALTER TABLE `check_step_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用表AUTO_INCREMENT `nodes`
--
ALTER TABLE `nodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `node_attr_group`
--
ALTER TABLE `node_attr_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `operations_log`
--
ALTER TABLE `operations_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
-- 使用表AUTO_INCREMENT `user_group_assign`
--
ALTER TABLE `user_group_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
