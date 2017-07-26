-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-26 14:09:54
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dongjing`
--

-- --------------------------------------------------------

--
-- 表的结构 `goods_category`
--

CREATE TABLE `goods_category` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `sort` tinyint(1) NOT NULL DEFAULT '10',
  `has_menu` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:有二级菜单，0无'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods_category`
--

INSERT INTO `goods_category` (`id`, `cate_name`, `icon`, `sort`, `has_menu`) VALUES
(3, '帽子', 'fa-at', 10, 1),
(4, '毛衣', 'fa-star-o', 10, 1),
(5, '鞋子', 'fa-star', 10, 0);

-- --------------------------------------------------------

--
-- 表的结构 `myguests`
--

CREATE TABLE `myguests` (
  `id` int(11) NOT NULL,
  `firstname` varchar(110) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `myguests`
--

INSERT INTO `myguests` (`id`, `firstname`, `lastname`, `email`) VALUES
(1, 'John', 'Doe', 'john@example.com'),
(2, 'Mary', 'Moe', 'mary@example.com'),
(3, 'Julie', 'Dooley', 'julie@example.com'),
(4, 'John', 'Doe', 'john@example.com'),
(5, 'Mary', 'Moe', 'mary@example.com'),
(6, 'Julie', 'Dooley', 'julie@example.com');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_cate` int(11) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_content`, `news_cate`, `thumb`, `create_time`, `view_count`) VALUES
(15, '《人民的名义》原班人马将拍新剧:改编自天上人间', '<p>时下，有“史上最大尺度反腐剧”之称的电视剧《人民的名义》，正在热播。</p><p>“政事儿”注意到，该剧班底还在筹备另一部反腐大剧——以“天上人间”真实案例改编的《天上人间》。</p><p>《人民的名义》出品方之一、中央军委后勤保障部金盾影视中心主任李学政（王文革扮演者）透露，讲述“天上人间”故事的二十集网络剧《天上人间》已决定拍摄，投资方热情高涨，单集费用超出一般电视剧很多，目的是为了保障该网络剧的品质绝不低于电视剧。</p><p>李学政还表示，《天上人间》网络剧完成拍摄之际，还将制作一部相当质量的院线电影，电影的报备工作也已经完成。</p><p><br/></p>', 2015, 'public/uploads/1491983209.png', 1491912303, 15),
(8, '高管和中层管理多久见一次面？', '<p>&nbsp;&nbsp;&nbsp;&nbsp;相比起4S店销售天花乱坠的妙语连珠、电视广告的言过其实，这些来自人民群众的声音的确在大伙购车的时候起到指导性的作用。“人民群众的眼睛是雪亮的”大\r\n概就是这把意思。而本着造福人类的原则，教授我特意上网收集了一下20万以下，用户口碑相对靠前的车型----名曰：避免购车跳火坑指南。各位看官，不妨\r\n赏个脸看看。</p>', 2015, 'public/uploads/1491911122.png', 1491578072, 10),
(9, '菲律宾总统将命令菲军队占领南沙岛礁 中方回应', '<p>一、应国务院总理李克强邀请，圣多美和普林西比民主共和国总理帕特里斯·特罗瓦达将于4月12日至18日对中国进行正式访问。</p><p>　　二、应外交部长王毅邀请，法兰西共和国外交和国际发展部长让-马克·艾罗将于4月13日至14日对中国进行正式访问。</p><p>　　三、应外交部长王毅邀请，巴勒斯坦外交部长马立基将于4月12日至15日对中国进行正式访问。</p><p>　<strong>　问：据报道，美国向叙利亚境内霍姆斯市空军基地等目标发射了59枚战斧巡航导弹，因为美方认定叙政府军此前从该空军基地发动化武袭击。中方对此有何评论？</strong></p><p>　　答：中方在化武问题上的立场是一贯的。我们反对任何国家、任何组织、任何个人在任何情况下、出于任何目的使用化学武器。我们谴责近日在叙利亚发\r\n生的化武袭击事件，支持联合国有关机构对所有使用或疑似使用化武事件进行独立、全面的调查，以确凿证据为基础，得出经得起历史和事实检验的结论。我们注意\r\n到事态的最新发展，现在的当务之急是防止局势进一步恶化，维护好来之不易的政治解决叙利亚问题的进程。</p><p><strong>　　问：美方在对叙利亚发动打击行动前是否向中方通报？</strong></p><p>　　答：我没有这方面的信息。</p><p>　<strong>　问：美国对叙利亚军事行动是否会影响在海湖庄园举行的习近平主席和特朗普总统会晤的议程安排？是否会把叙利亚问题提到更重要的地位？另有人认为，本次美国军事行动可能会淡化中美元首会晤的重要性，中方对此有何评论？</strong></p><p>　　答：刚才我已经表明中方对叙利亚最新事态的看法和立场。大家都非常关注中美元首海湖庄园会晤。从中美双边关系角度看，我们希望这次会晤有利于增\r\n进中美两国之间的相互了解，推进两国合作，为未来中美关系发展作出规划，指明方向。我无法预判两国领导人讨论的具体议题次序，但我想两国元首会就中美关系\r\n及共同关心的国际和地区问题，包括他们认为重要和紧迫的问题交换意见。</p><p><br/></p>', 2015, 'public/uploads/1491910758.png', 1491617458, 4),
(10, '美国向叙利亚发射超50枚战斧巡航导弹', '<p><span class="num"></span></p><p><span style="font-size: 20px;"><strong>4月7日，美国向叙利亚境内一大型机场发射了超50枚战斧导弹，瞄准机库和飞机，以此作为叙利亚毒气袭击事件的回应</strong></span></p><p><br/></p>', 2015, 'public/uploads/1491910664.png', 1491617532, 5),
(11, '十多年的Linux尝试 最终慕尼黑可能重回Windows怀抱', '<p><strong>经过十多年的Linux实验，慕尼黑政府正在考虑回归到微软的Windows系统。</strong>早在2003年，巴伐利亚州州府就\r\n决定放弃Windows系统转而拥抱开源解决方案，因此诞生了LiMux (Linux + München) \r\n；2009年，在耗资3000万欧元之后这套软件终于完成，政府内大约15000台电脑迁移到开源操作系统。然而在2014年，该市新任市长表示希望重新\r\n迁移到微软的操作系统，但当时并未提供任何转换的计划。</p>', 2015, 'public/uploads/1491911062.png', 1491623000, 7),
(14, '20万以内最好的车？看看人民群众怎么说', '<p>&nbsp;&nbsp;&nbsp;&nbsp;在如今这个人人推崇诚信，然而并没有人讲诚信的社会，不少的首次买车的人都是心惊胆战、一惊一乍的。生怕车子买回来以后，才发现动力不好、空间不好又或者\r\n是小毛病不断。“卧槽，老子花了好几年的积蓄就买了这破玩意？”为了避免堕入火坑，广大人民群众开始团结起来，身体力行地把自身的见解亦或经验在网上进行\r\n分享，也就是大家经常看到的“用户口碑”。</p>', 2015, 'public/uploads/1491910696.png', 1491908232, 5);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `email`) VALUES
(1, '赵天平', '90', NULL),
(2, '张冬雪', '115', NULL),
(3, 'MR.KING1', 'MR.KING1', 'MR.KING1@imooc.com'),
(4, 'imooc1', 'imooc1', 'imooc1@imooc.com'),
(5, 'MR.KING1', 'MR.KING1', 'MR.KING1@imooc.com'),
(6, 'imooc1', 'imooc1', 'imooc1@imooc.com'),
(7, 'MR.KING1', 'MR.KING1', 'MR.KING1@imooc.com'),
(8, 'imooc_king', 'imooc_king', 'imooc@imooc.com'),
(9, 'imooc_king1', 'imooc_king1', 'imooc@imooc.com'),
(10, 'imooc_king22', 'imooc_king22', 'king@imooc.com'),
(11, 'imooc_king33', 'imooc_king33', 'king33@imooc.com'),
(12, 'imooc1', 'imooc1', 'imooc1@imooc.com'),
(13, 'MR.KING1', 'MR.KING1', 'MR.KING1@imooc.com'),
(14, 'imooc1', 'imooc1', 'imooc1@imooc.com'),
(15, 'MR.KING1', 'MR.KING1', 'MR.KING1@imooc.com'),
(23, '王萍', '116', '45'),
(22, '孙维维', '86', '66'),
(21, '胡伟', '107', '99'),
(20, '周一刚', '55', '80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods_category`
--
ALTER TABLE `goods_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myguests`
--
ALTER TABLE `myguests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `goods_category`
--
ALTER TABLE `goods_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `myguests`
--
ALTER TABLE `myguests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
