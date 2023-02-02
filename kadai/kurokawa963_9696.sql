-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql642.db.sakura.ne.jp
-- 生成日時: 2023 年 2 月 02 日 23:19
-- サーバのバージョン： 5.7.40-log
-- PHP のバージョン: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kurokawa963_9696`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_o1`
--

CREATE TABLE `kadai_o1` (
  `id` int(12) NOT NULL,
  `place` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `kind` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `introduction` longtext COLLATE utf8mb4_bin NOT NULL,
  `img_type` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `photo` varchar(240) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `kadai_o1`
--

INSERT INTO `kadai_o1` (`id`, `place`, `kind`, `introduction`, `img_type`, `photo`) VALUES
(10, '荒浜小学校', '学習施設', '津波で一階が流された。\r\n', 'image/jpeg', 'kadai_data/20230111151606appearance.jpg'),
(11, '回天基地遺構', '戦争遺構', '人間魚雷の訓練基地。\r\n周南市徳山港よりフェリーで40分。\r\n', 'image/jpeg', 'kadai_data/20230112121623oodushima201910-07.jpg'),
(12, '平和記念館', '学習施設', '第二次世界大戦中に落とされた原爆による被害内容を展示している施設。\r\nこの展示を通して、戦争の凄惨さを学び後世に二度と戦争を起こしてはならないという平和教育を行っている。', 'image/jpeg', 'kadai_data/20230118154520genbaku.jpg'),
(13, 'アウシュビッツ', '戦争遺構', 'ナチスのユダヤ人大量虐殺の舞台', 'image/jpeg', 'kadai_data/2023011818270198E2EF49-CD39-4F84-B9F9-6BF828D087A6.jpeg'),
(14, '無窮洞', '戦争遺構', '防空壕の一種。\r\n手で掘ったらしいけどめちゃくちゃ広いし教室とか炊事場とかある。', 'image/jpeg', 'kadai_data/20230118184426mukyuudou.jpg'),
(15, '知覧特攻平和会館', '戦争遺構', 'この知覧特攻平和会館は、第二次世界大戦末期の沖縄戦において特攻という人類史上類のない作戦で、爆装した飛行機もろとも敵艦に体当たり攻撃をした陸軍特別攻撃隊員の遺品や関係資料を展示しています。\r\n\r\nhttps://www.chiran-tokkou.jp/より\r\n\r\n', 'image/jpeg', 'kadai_data/20230118192524ダウンロード.jpeg'),
(16, 'マニラ', '戦争遺構', '野良犬がいっぱい', 'image/jpeg', 'kadai_data/2023011821581410273241_739556576115783_79427640722601551_o.jpg'),
(17, '人と防災未来センター', '学習施設', '阪神淡路大震災で起こった被害の模型が展示されている。\r\n南海トラフ地震で想定される被害についても学ぶことができる。', 'image/jpeg', 'kadai_data/20230130005404hitomirai.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_user`
--

CREATE TABLE `kadai_user` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `kadai_user`
--

INSERT INTO `kadai_user` (`id`, `username`, `password`, `is_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'erika@onigiri.com', 'erika', 0, '2023-01-15 21:12:26', '2023-01-15 21:12:26', NULL),
(2, 'ttrknk115@yahoo.ne.jp', 'hopbs678', 0, '2023-01-18 16:06:05', '2023-01-18 16:06:05', NULL),
(3, 'kurokawa338garcons@gmail.com', 'kurokawa338', 0, '2023-01-18 17:49:50', '2023-01-18 17:49:50', NULL),
(4, 'broccoli@gmail.com', 'broccoli', 0, '2023-01-18 18:23:54', '2023-01-18 18:23:54', NULL),
(5, 'あいうえお', 'あいうえお', 0, '2023-01-18 18:25:53', '2023-01-18 18:25:53', NULL),
(6, 'ggg@gmail.com', 'ああいいうう', 0, '2023-01-18 18:33:37', '2023-01-18 18:33:37', NULL),
(7, 'guolam123@gmail.com', 'testtest01', 0, '2023-01-18 18:34:09', '2023-01-18 18:34:09', NULL),
(8, 'maki@example.com', 'thisistestaccount', 0, '2023-01-18 18:34:16', '2023-01-18 18:34:16', NULL),
(9, 'dio@example.dev', 'wryyy', 0, '2023-01-18 19:20:45', '2023-01-18 19:20:45', NULL),
(10, 'pote@com', 'pote', 0, '2023-01-18 21:35:58', '2023-01-18 21:35:58', NULL),
(11, 'testuser@test', '000000', 0, '2023-01-18 21:39:40', '2023-01-18 21:39:40', NULL),
(12, 'kodamahiroyasu@dhw.co.jp', 'kodakoda', 0, '2023-01-18 21:56:31', '2023-01-18 21:56:31', NULL),
(13, 'testuser01', '111111', 0, '2023-01-30 19:51:45', '2023-01-30 19:51:45', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kadai_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `kadai_id`, `created_at`) VALUES
(1, 1, 1, '2023-02-01 12:10:55');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai_o1`
--
ALTER TABLE `kadai_o1`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `kadai_user`
--
ALTER TABLE `kadai_user`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `kadai_o1`
--
ALTER TABLE `kadai_o1`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルのAUTO_INCREMENT `kadai_user`
--
ALTER TABLE `kadai_user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルのAUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
