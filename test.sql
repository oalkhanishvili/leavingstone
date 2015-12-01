-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 08:05 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('010de868c6d8662cef140826820904e9c9b25c84', '149.3.119.33', 1442945279, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323934353237373b),
('046afe4226fc42db49635398eef9c93a2fbb9dc4', '46.49.92.152', 1442910997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931303932343b757365726e616d657c733a393a22656b61746572696e65223b757365725f69647c733a333a22313131223b),
('07349db6cfbe4ba396d4f400a293e68e3e06d823', '46.49.92.152', 1442924395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323932343336373b6c6f676765647c733a353a2261646d696e223b),
('13b7b74fd031250d1fb5e4e4a1fedf7c0e0bc68b', '176.73.178.251', 1442909098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930393039373b),
('16a6e38c7381aafd22593971d32f3e94965519fe', '176.73.173.148', 1443014674, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434333031343637313b6c6f676765647c733a353a2261646d696e223b),
('187818f33c1d9b5c835a13db763f1883bbf8a02f', '46.49.92.152', 1442912865, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931323636303b6c6f676765647c733a353a2261646d696e223b),
('1a5c9ad00723159d568d283e7c57c2a4be527094', '176.73.173.148', 1443015301, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434333031353034313b6c6f676765647c733a353a2261646d696e223b),
('1c28359aff60b1491bdaec47153f19233ae1b899', '46.49.92.152', 1442908064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930373739353b),
('1d24e240716aefa0ffd91d07820953c5ecd18872', '46.49.92.152', 1442909719, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930393730303b757365726e616d657c733a373a22746f6b6f303737223b757365725f69647c733a333a22313134223b),
('1d85fbdd455e0f8911aff98c8837ebda3fc4caaf', '149.3.42.246', 1442932160, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323933323133353b757365726e616d657c733a363a226c656e696b6f223b757365725f69647c733a333a22313039223b),
('1dd51868990bf86bfbb33aee33452b2234aa7b56', '46.49.92.152', 1442913673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931333637323b757365726e616d657c733a393a22656b61746572696e65223b757365725f69647c733a333a22313131223b),
('22e66957d0140168c62ba28d15ec1158b95ac6fe', '176.73.178.251', 1442909662, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930393635373b757365726e616d657c733a363a22746573743131223b757365725f69647c733a323a223935223b),
('280b05cc41b0d83d6c21f50728efa50cabb621e8', '46.49.92.152', 1442994246, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939343232383b6c6f676765647c733a353a2261646d696e223b),
('2a60a3d8868bd692bd13c0c14f7dc1661e9af763', '66.220.158.114', 1442907445, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930373434323b),
('30282ad2044766915122ee7363a9f0797c880815', '176.73.73.157', 1442902706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930323730353b),
('30e64f1592cebb41b3fb64519c9d0b99957fe61d', '46.49.92.152', 1442993211, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939333231303b),
('31bce868a2b9592896cba8a4f66ebf4978e5fc6c', '46.49.92.152', 1442995458, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939353435383b6c6f676765647c733a353a2261646d696e223b),
('34faeb981579b25d04c6fa79f90535596ab1a4bd', '46.49.92.152', 1442911834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931313636383b757365726e616d657c733a393a22656b61746572696e65223b757365725f69647c733a333a22313131223b),
('3599dd390254dc04aa576bfa08ccdf58d99d35fe', '46.49.92.152', 1442914738, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931343535373b757365726e616d657c733a353a226d61696b6f223b757365725f69647c733a333a22313037223b),
('35b8b9a050a37b9bdafda12d7e99d47d5172cef0', '46.49.92.152', 1442914284, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931343038303b757365726e616d657c733a353a226d61696b6f223b757365725f69647c733a333a22313037223b),
('40133b81e9d2431050505c56b7b46a7a92194073', '46.49.92.152', 1442908793, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930383537383b757365726e616d657c733a373a22746f6b6f303737223b757365725f69647c733a333a22313134223b),
('4161e5ea3123453f4163366f1831fc6a71cf6bfc', '66.249.93.211', 1442920875, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323932303837333b),
('42c549c9998f65ff123b058b8e903479eaefdcbc', '46.49.92.152', 1442915261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931353235343b757365726e616d657c733a353a226d61696b6f223b757365725f69647c733a333a22313037223b),
('45dc9113a8ac6517918072bda5f06986c895928b', '92.51.77.23', 1442906536, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930363438303b),
('4d2025a970c33c357bb6649443ec3c965de5dbfb', '46.49.92.152', 1442911392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931313230313b6c6f676765647c733a353a2261646d696e223b6d6573736167657c733a35383a22e183a9e18390e1839ce18390e183ace18394e183a0e1839820e18393e18390e1839be18390e183a2e18394e18391e183a3e1839ae18398e18390223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226e6577223b7d),
('4da8fe802c212ee437cdfc1180bd30640ce94ad8', '46.49.92.152', 1442997013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939373031323b6c6f676765647c733a353a2261646d696e223b),
('4feabf82bd3a5e927a2dcc376d8629b18a168411', '92.51.77.23', 1442905905, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930353633343b757365726e616d657c733a343a226c65766f223b757365725f69647c733a333a22313133223b),
('5098b74f52629be0f2a15851ddc4c1941465bfd0', '176.73.73.157', 1442902707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930323730363b),
('54a6f5f8850dcd0354b1bf4ad5432a6df3129cfc', '176.73.178.251', 1442999046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939393034343b),
('5b4c4e417c1de323619db20a965aa69c1cba206e', '46.49.92.152', 1442909061, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930393036303b757365726e616d657c733a373a22746f6b6f303737223b757365725f69647c733a333a22313134223b),
('5fa566c8265e7b02ab08075e45397ed222cc318c', '178.134.96.80', 1442914401, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931343430303b),
('6379850bb19c7fc467a53241628629e62c33a104', '46.49.92.152', 1442905794, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930353738313b6c6f676765647c733a353a2261646d696e223b),
('667577b94323349ad0e27201c4ddac5d2664b916', '46.49.92.152', 1442912274, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931323037353b6c6f676765647c733a353a2261646d696e223b),
('68c6252b9bc658c9607d222c19f2d8edf96253d6', '46.49.92.152', 1443001798, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434333030313739383b6c6f676765647c733a353a2261646d696e223b),
('6bb30738d949fcef8b0614ded8dae98686041cf3', '46.49.92.152', 1443009245, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434333030393234343b),
('721720796e9741a41d6ee1cb89ba28041b0f3cbb', '46.49.92.152', 1442908578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930383537363b757365726e616d657c733a373a22746f6b6f303737223b757365725f69647c733a333a22313134223b),
('75ebc7d093b1070d869e1f7425669d9a39a3df54', '46.49.92.152', 1442993776, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939333438343b),
('804262c836c38c4704a5e24913c9979cbedc046e', '212.72.149.114', 1442997108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939363936353b757365726e616d657c733a353a226d61696b6f223b757365725f69647c733a333a22313037223b),
('858d9f6778761b25338efd352a98054e852d44ef', '46.49.92.152', 1442912935, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931323639303b757365726e616d657c733a393a22656b61746572696e65223b757365725f69647c733a333a22313131223b),
('85bf103eb1a52d2473eb3bc8f77faa5bac26fcd3', '46.49.92.152', 1442905471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930353232333b6c6f676765647c733a353a2261646d696e223b),
('950d322d06806ec5ccde2b0f85cfb8358d26e070', '176.73.178.251', 1442996975, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939363937343b),
('98d6ca2e6f9980154e70ec41b80bdcf1124d28b8', '46.49.92.152', 1442926549, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323932363437353b6c6f676765647c733a353a2261646d696e223b6d6573736167657c733a34363a22e183a9e18390e1839ce18390e183ace18394e183a0e1839820e183ace18390e18398e183a8e18390e1839ae18390223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226e6577223b7d),
('a6c58609098fe9cf56a6b0881804c44a2b81d2f3', '46.49.92.152', 1442913144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931333134333b757365726e616d657c733a393a22656b61746572696e65223b757365725f69647c733a333a22313131223b),
('ac22d798ad3cf5966c578da613aee8ee475c42cb', '176.73.173.148', 1443011160, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434333031313132303b),
('acce88b0f2dfc13ae1fe8aea1b6ecc44e37a62cf', '46.49.92.152', 1442910824, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931303832343b6c6f676765647c733a353a2261646d696e223b),
('aefe9cf9e32ddf4a0d55b186160cdadafb770405', '46.49.92.152', 1442928724, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323932383732323b),
('b3a17ef157dcc1f335ed0ae36c3c0d3772866b0e', '176.73.173.148', 1443010289, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434333031303031323b757365726e616d657c733a343a2274657374223b757365725f69647c733a333a22313034223b),
('b647e4346f394ee7b5c1db813c5ded35dfa65129', '46.49.92.152', 1442994653, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939343634393b6c6f676765647c733a353a2261646d696e223b),
('bb1c1832a21f55bd9e054cd0df7b154650ed02e0', '92.51.77.23', 1442906111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930363035313b757365726e616d657c733a343a226c65766f223b757365725f69647c733a333a22313133223b),
('c26cb90e71c5a0b2244fe9f2b208cbf6b2beae8c', '46.49.92.152', 1442907766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930373436353b),
('c28ab742c0c9d78295df1b698fc1f4f98097b03a', '66.249.93.215', 1442920874, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323932303837333b),
('c9ff2ecf9865fade9bf6fb9f42d4728b13365ba0', '46.49.92.152', 1442928400, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323932383430303b6c6f676765647c733a353a2261646d696e223b6d6573736167657c733a34363a22e183a9e18390e1839ce18390e183ace18394e183a0e1839820e183ace18390e18398e183a8e18390e1839ae18390223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226e6577223b7d),
('cc6be2303abb677dd88fded06014140535d533fe', '46.49.92.152', 1442909670, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930393339323b757365726e616d657c733a373a22746f6b6f303737223b757365725f69647c733a333a22313134223b),
('ccd3d7e1972a7bf5806a547983bea6b65bfafafb', '66.220.158.123', 1442932774, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323933323737333b),
('d5f08b076d8cff52719384f4cf1cd7f96bd03efb', '66.249.93.207', 1442994411, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939343431303b),
('dea0d3a22cf696852b8174f5af69b0e39b689623', '46.49.92.152', 1442906189, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930363136373b6c6f676765647c733a353a2261646d696e223b),
('dfb7266cbcbe901c4fe8b970eb1f812164f24faf', '46.49.92.152', 1442915152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931343839313b757365726e616d657c733a353a226d61696b6f223b757365725f69647c733a333a22313037223b),
('e27f3c0149f6a3798eb30be1d9517af969e3d196', '46.49.92.152', 1442915574, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931353339323b757365726e616d657c733a393a22656b61746572696e65223b757365725f69647c733a333a22313131223b),
('e32314384b0e82e3ee9a7e87d6ecd41769649c9e', '46.49.92.152', 1442908318, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323930383130343b757365726e616d657c733a373a22746f6b6f303737223b757365725f69647c733a333a22313134223b),
('e4e2c51c10be629a9ee6795b161afbbcfdd5a972', '46.49.92.152', 1442993245, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939333231303b757365726e616d657c733a393a22656b61746572696e65223b757365725f69647c733a333a22313131223b),
('ef355444631703320e467a7e18b12057a76b821b', '176.73.173.148', 1443011674, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434333031313535383b),
('f0b03390f22a02a5ea8b8c9cab1bb536502e8234', '46.49.92.152', 1442994051, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323939333738363b6c6f676765647c733a353a2261646d696e223b6d6573736167657c733a35383a22e183a9e18390e1839ce18390e183ace18394e183a0e1839820e18393e18390e1839be18390e183a2e18394e18391e183a3e1839ae18398e18390223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('f11400b9590fb330a46b9a2f75cfbc95fefe5d00', '46.49.92.152', 1442910926, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434323931303932333b),
('f2a621edfd038797f9b8042446e765f52dd8efbf', '176.73.173.148', 1443011005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434333031303830393b757365726e616d657c733a343a2274657374223b757365725f69647c733a333a22313034223b);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `task_id` int(5) NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `task_id`, `comment`, `attachment`, `create_date`) VALUES
(1, 116, 3, 'კომენტარი', '', '2015-12-01 18:57:41'),
(2, 116, 3, '', '1356834285_img-girl.png', '2015-12-01 18:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(5) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `user_id` int(5) NOT NULL,
  `done` int(5) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `finish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `user_id`, `done`, `create_date`, `finish_date`) VALUES
(1, 'პროექტი სახელი', '<p>პრეოქტის შესახებ ინფორმაცია იაქნება აქ</p>', 106, 1, '2015-11-29 13:09:13', '2015-12-01 11:36:04'),
(2, 'პროექტი სახელი', '<p>პრეოქტის შესახებ ინფორმაცია იაქნება აქ</p>', 106, 1, '2015-11-30 18:11:00', '2015-12-01 15:50:04'),
(4, 'პროექტი სახელი', '<p>პრეოქტის შესახებ ინფორმაცია იაქნება აქ</p>', 107, 0, '2015-11-30 13:11:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(5) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `done` int(5) NOT NULL,
  `project_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `finish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `done`, `project_id`, `user_id`, `attachment`, `create_date`, `finish_date`) VALUES
(1, 'დავალება1', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'front-end', 1, 1, 106, '1356834285_img-girl.png', '2015-11-26 14:10:53', '2015-11-29 10:22:36'),
(2, 'დავალება2', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'front-end', 1, 1, 106, '1356834285_img-girl.png', '2015-11-26 14:16:20', '2015-11-29 10:22:37'),
(3, 'დავალება1', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'back-end', 1, 1, 107, '1356834285_img-girl.png', '2015-11-28 15:11:00', '2015-11-29 10:22:37'),
(4, 'დავალება3', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'front-end', 1, 3, 108, '1356834285_img-girl.png', '2015-11-26 14:45:36', '2015-11-30 08:22:16'),
(5, 'დავალება3', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'content', 0, 3, 108, '1356834285_img-girl.png', '2015-11-26 14:46:28', '0000-00-00 00:00:00'),
(7, 'დავალება3', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'front-end', 0, 3, 106, '1356834285_img-girl.png', '2015-11-26 17:12:46', '0000-00-00 00:00:00'),
(9, 'დავალება', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'content', 1, 2, 115, '', '2015-11-28 13:34:15', '2015-12-01 15:45:11'),
(10, 'დავალება', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'content', 1, 2, 115, '', '2015-11-28 13:37:23', '2015-12-01 15:45:41'),
(11, 'დავალება', 'ტექსტი დავალებისთვის სატესტოდ ეწერება აქ', 'front-end', 1, 2, 116, '', '2015-11-30 14:30:37', '2015-12-01 15:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL,
  `name_en` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_en`, `password`, `email`, `date`) VALUES
(106, 'nino karakula', 'e10adc3949ba59abbe56e057f20f883e', 'nntulashvili@gmail.com', '0000-00-00'),
(107, 'maia karakula', 'e10adc3949ba59abbe56e057f20f883e', 'maiko@lutecia.ge', '0000-00-00'),
(108, 'manana karakula', 'e10adc3949ba59abbe56e057f20f883e', 'mgogoreliani@yahoo.com', '0000-00-00'),
(109, 'leniko Mamukashvili', 'e10adc3949ba59abbe56e057f20f883e', 'mamukashvililika@gmail.com', '0000-00-00'),
(110, 'eka gogoladze', 'e10adc3949ba59abbe56e057f20f883e', 'ekagogoladze12@yahoo.com', '0000-00-00'),
(111, 'ekaterine gogoladze', 'e10adc3949ba59abbe56e057f20f883e', 'ekaterinegogoladze12@gmail.com', '0000-00-00'),
(115, 'giorgi bliadze', 'e10adc3949ba59abbe56e057f20f883e', 'agasg@mail.ru', '0000-00-00'),
(116, 'saxeli gvari', 'e10adc3949ba59abbe56e057f20f883e', '123@mail.ru', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
