-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-11-12 14:16:15
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `motto`
--

-- --------------------------------------------------------

--
-- 資料表結構 `motto`
--

CREATE TABLE `motto` (
  `id` tinyint(3) NOT NULL,
  `saying` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `motto`
--

INSERT INTO `motto` (`id`, `saying`, `person`) VALUES
(1, 'Tell me and I forget. Teach me and I remember. Involve me and I learn.', 'Benjamin Franklin'),
(2, 'A pessimist is one who makes difficulties of his opportunities and an optimist is one who makes opportunities of his difficulties.', 'Harry S. Truman'),
(3, 'Always remember that you are absolutely unique. Just like everyone else.', 'Margaret Mead'),
(4, 'An unexamined life is not worth living.', 'Socrates'),
(5, 'Challenges are what make life interesting and overcoming them is what makes life meaningful.', 'Joshua J. Marine'),
(6, 'Don\'t judge each day by the harvest you reap but by the seeds that you plant.', 'Robert Louis Stevenson'),
(7, 'Education is not the filling of a pail but the lighting of a fire.', 'William Butler Yeats'),
(8, 'Every man is a poet when he is in love.', 'Plato'),
(9, 'Genius only means hard-working all one\'s life.', 'Mendeleyev'),
(10, 'Happiness lies not in the mere possession of money; it lies in the joy of achievement, in the thrill of creative effort.', 'Franklin Roosevelt'),
(11, 'I am a slow walker, but I never walk backwards.', 'Abraham Lincoln'),
(12, 'I can\'t change the direction of the wind, but I can adjust my sails to always reach my destination.', 'Jimmy Dean'),
(13, 'I didn\'t fail the test. I just found 100 ways to do it wrong.', 'Benjamin Franklin'),
(14, 'I disapprove of what you say, but I will defend to the death your right to say it.', 'Voltaire'),
(15, 'If I looked compared to others far, is because I stand on giant\'s shoulder.', 'Newton'),
(16, 'If you can\'t fly, then run; if you can\'t run, then walk; if you can\'t walk, then crawl; but whatever you do you have to keep moving forward.', 'Martin Luther King'),
(17, 'If you don\'t like something, change it; if you can\'t change it, change the way you think about it.', 'Mary Engelbreit'),
(18, 'If you have no critics, you will likely have no success.', 'Malcolm S. Forbes'),
(19, 'If you judge people, you have no time to love them.', 'Mother Teresa'),
(20, 'If you look at what you have in life, you\'ll always have more. If you look at what you don\'t have in life, you\'ll never have enough.', 'Oprah Winfrey'),
(21, 'Imagination is more important than knowledge.', 'Albert Einstein'),
(22, 'Intelligence plus character – that is the goal of real education.', 'Martin Luther King'),
(23, 'It is not how much you do, but how much love you put into the doing that matters.', 'Mother Teresa'),
(24, 'Knowledge is a treasure, but practice is the key to it.', 'British churchman ?Thomas Full'),
(25, 'Knowledge is power.', 'Francis Bacon'),
(26, 'Life is like riding a bicycle. To keep your balance you must keep moving.', 'Albert Einstein'),
(27, 'Living without an aim is like sailing without a compass.', 'Alexandre Dumas'),
(28, 'Love the life you live. Live the life you love.', 'Bob Marley'),
(29, 'Love well, whip well.', 'Benjamin Franklin'),
(30, 'Never argue with stupid people, they will drag you down to their level and then beat you with experience.', 'Mark Twain'),
(31, 'Success is not final, failure is not fatal: it is the courage to continue that counts.', 'Winston Churchill'),
(32, 'The best and most beautiful things in the world cannot be seen or even touched. They must be felt with the heart.', 'Helen Keller'),
(33, 'The first wealth is health.', 'Ralph Waldo Emerson'),
(34, 'The greatest glory in living lies not in never falling, but in rising every time we fall.', 'Nelson Mandela'),
(35, 'The only thing we have to fear is fear itself.', 'Franklin Roosevelt'),
(36, 'The only way to do great work is to love what you do. If you haven\'t found it yet, keep looking. Don\'t settle.', 'Steve Jobs'),
(37, 'The ordinary focus on what they\'re getting. The extraordinary think about who they\'re becoming.', 'Robin Sharma'),
(38, 'The past cannot be changed. The future is yet in your power.', 'Mary Pickford'),
(39, 'The purpose of our lives is to be happy.', 'Dalai Lama'),
(40, 'The way to get started is to quit talking and begin doing.', 'Walt Disney'),
(41, 'There are seven things that will destroy us: wealth without work; pleasure without conscience; knowledge without character; religion without sacrifice; politics without principle; science without humanity; business without ethics.', 'Mahatma Gandhi'),
(42, 'Those who dare to fail miserably can achieve greatly.', 'John F. Kennedy'),
(43, 'Try not to become a man of success but rather try to become a man of value.', 'Albert Einstein'),
(44, 'Until we can manage time, we can manage nothing else.', 'Peter F. Drucker'),
(45, 'We must accept finite disappointment, but we must never lose infinite hope.', 'Martin Luther King'),
(46, 'When the whole world is silent, even one voice becomes powerful.', 'Malala'),
(47, 'When we are saying this cannot be accomplished, this cannot be done, then we are short-changing ourselves. My brain, it cannot process failure. It will not process failure.', 'Kobe Bryant'),
(48, 'Where there is a will, there is a way.', 'Thomas Edison'),
(49, 'You have to believe in yourself . That\'s the secret of success.', 'Charles Chaplin'),
(50, 'You must be the change you want to see in the world.', 'Gandhi');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `motto`
--
ALTER TABLE `motto`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `motto`
--
ALTER TABLE `motto`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
