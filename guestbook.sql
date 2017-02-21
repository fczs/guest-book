-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2017 at 08:32 AM
-- Server version: 5.6.35
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `gb_messages`
--

CREATE TABLE `gb_messages` (
  `ID` int(11) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AUTHOR_ID` int(11) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `MESSAGE` longtext NOT NULL,
  `PUBLISHED` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gb_messages`
--

INSERT INTO `gb_messages` (`ID`, `DATE`, `AUTHOR_ID`, `TITLE`, `MESSAGE`, `PUBLISHED`) VALUES
(1, '2017-02-19 21:14:22', 12, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', 'Y'),
(2, '2017-02-20 06:38:24', 4, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'N'),
(3, '2017-02-20 18:51:35', 10, 'New message', 'The Free School is a global community of people studying the \nNew Message from God and sharing it with others. The School offers an online environment of individual study, study \npartnerships, international gatherings, broadcast events and community interaction to deepen your experience of the \nNew Message and connect you with other students around the world.', 'Y'),
(4, '2017-02-20 18:52:26', 10, 'New message is newer than previous', 'The Free School is a global community of people studying the \nNew Message from God and sharing it with others. The School offers an online environment of individual study, study \npartnerships, international gatherings, broadcast events and community interaction to deepen your experience of the \nNew Message and connect you with other students around the world.', 'Y'),
(5, '2017-02-20 18:54:48', 9, 'Don\'t underestimate a password strength', 'Simple password meters check the length and entropy of the password and have checklists for the kinds of things that users are advised to include in their passwords; mixtures of upper and lower case letters, numbers and special characters, for example.\n\nThat helps determine a password’s ability to withstand a brute force attack (an attacker making guesses at random), but being resistant to brute force attacks is only useful if that’s what an attacker is going to do, and it probably isn’t.\n\nA brute force attack assumes that all guesses are equally good.', 'Y'),
(8, '2017-02-20 18:57:28', 8, 'Obama Dog Sunny Bites White House Guests', 'President Obama had to deal with a small domestic crisis at the White House -- a family friend was bitten by Sunny, the First Family\'s 4-year-old dog.\n\nWe\'re told the incident occurred Monday when the 18-year-old was visiting the White House. Sources connected to the girl tell us she went to pet and kiss Sunny, and the dog bit her on the face.\n\nSunny -- a female Portuguese Water Dog -- left a nasty gash under the girl\'s eye. We\'re told the Obamas\' family physician, Dr. Ronny Jackson, checked her out and decided she needed stitches.\n\nShe\'s gonna be okay, but we\'re told she\'ll likely have a small scar ... which upset her. She posted various pics of the injury and her visit to Dr. Jackson on social media. \n\nThe bite is out of character for the breed, which typically is not aggressive in family situations. The Obamas have 2 Portuguese Water Dogs -- 8-year-old Bo has the title,\"First Dog.\"', 'Y'),
(9, '2017-02-21 04:10:34', 6, 'Hello', 'Hello world!', 'Y'),
(10, '2017-02-21 04:11:52', 6, 'Marine Le Pen\'s Front National headquarters raided by police', 'French police searched the headquarters of Marine Le Pen’s far-right Front National on Monday evening as part of an official investigation into “fake” jobs involving the misuse of European Union funds to pay for a bodyguard and an assistant in Paris.\n\nBrussels investigators claim Le Pen paid her bodyguard, Thierry Légier, more than €41,500 (£35,350) between October and December 2011, by falsely claiming he was an EU parliamentary assistant. She is also accused of paying nearly €298,000 between December 2010 and 2016 to her France-based assistant Catherine Griset.', 'Y'),
(11, '2017-02-21 04:12:48', 6, 'U2\'s Bono meets with Mike Pence', 'While in Europe for his first major foreign policy address representing the Trump administration, Mike Pence had an impromptu meeting with U2 frontman Bono.\n\nThe activist and singer called the vice-president \"the second-busiest man on Earth.\"\n \nPence met with the Irish rock star along the sidelines of the Munich Security Conference.\n\nBono offered his appreciation to the vice-president for meeting and noted that Pence had twice supported bills in Congress to provide AIDS medication to African nations.\n\nReporters were then ushered away. Watch the exchange below.', 'Y'),
(12, '2017-02-21 04:14:09', 4, 'Martin Fourcade', 'Fourcade took up biathlon in 2002 and started competing internationally in 2006, following in the footsteps of his older brother Simon Fourcade. The younger Fourcade competed for France in the 2007 and 2008 Junior World Championships, winning a bronze medal in the relay in 2007.\n\nFourcade first competed in the Biathlon World Cup at Oslo in March 2008, finishing 61st in what would be his only World Cup appearance that season. The next season was already much more successful for him, as he grabbed his first World Cup points at Hochfilzen, placing 36th in the individual race and 10th in the sprint. His best results that year came at the 2009 World Championships, where he finished in the top 20 in every competition, including an 8th place in the pursuit and a 4th place in the relay. Fourcade finished 24th in the overall World Cup that year.', 'Y'),
(13, '2017-02-21 04:15:20', 4, 'NBA All-Star Game 2017 rosters: Lineup, starters and reserves', 'All-Star Sunday is finally here. The 66th NBA All-Star Game will take place Sunday, Feb. 19, and will take place at the Smoothie King Arena in New Orleans. The Western Conference team has won the past two editions and Thunder star Russell Westbrook has taken home MVP honors in both of those exhibitions.', 'Y'),
(14, '2017-02-21 04:16:16', 12, 'Cristiano Ronaldo: I am an ambitious player with only one objective: victory for my team', 'Cristiano Ronaldo is a player who is destined to make history. Thanks to his immense natural talent, the Portuguese forward is a commanding leader for Real Madrid and his national team. Since he arrived at the Bernabéu from Manchester United, his goalscoring figures have just kept on improving to the delight of Madrid fans. He is now firmly established as one of the leading goalscorers in the history of the club and he wants to further improve the already illustrious lists of honours won by the greatest club of the 20th Century.', 'Y'),
(15, '2017-02-21 04:17:23', 12, 'Andromeda Galaxy Facts', 'The Andromeda Galaxy (M31) is the closest large galaxy to the Milky Way and is one of a few galaxies that can be seen unaided from the Earth. In approximately 4.5 billion years the Andromeda Galaxy and the Milky Way are expected to collide and the result will be a giant elliptical galaxy. Andromeda is accompanied by 14 dwarf galaxies, including M32, M110, and possibly M33 (The Triangulum Galaxy).\n\nDesignation:	M31 or NGC 224\nType:	Spiral\nDiameter:	220,000 ly\nDistance:	2.54 Mly\nMass:	1,230 billion M☉\nNumber of Stars	1 trillion\nConstellation:	Andromeda\nGroup:	Local Group', 'Y'),
(16, '2017-02-21 04:19:47', 6, 'Dog–cat relationship', 'Dogs and cats have a range of interactions. The natural instincts of each species lead towards antagonistic interactions, though individual animals can have non-aggressive relationships with each other, particularly under conditions where humans have socialized non-aggressive behaviors.\n\nThe generally aggressive interactions between the species have been noted in cultural expressions.\n\nThe signals and behaviors that cats and dogs use to communicate are different and can lead to signals of aggression, fear, dominance, friendship or territoriality being misinterpreted by the other species. Dogs have a natural instinct to chase small prey that flee, an instinct common among cats. Most cats flee from a dog, while others take actions such as hissing, arching their backs and swiping at the dog. After being scratched by a cat, some dogs can become fearful of cats.\n\nIf appropriately socialized, cats and dogs may have relationships that are not antagonistic, and dogs raised with cats may prefer the presence of cats to other dogs. Even cats and dogs that have got along together in the same household may revert to aggressive reactions due to external stimuli, illness, or play that escalates.', 'Y'),
(17, '2017-02-21 04:21:34', 9, 'North Korea, the Ultimate Challenge for a Dealmaker', 'President Trump had a subdued response to North Korea’s latest missile test this month, while he was playing host to Prime Minister Shinzo Abe of Japan and toasting newlyweds at his Mar-a-Lago club in Florida.\n\nHe has talked about curbing North Korea’s nuclear threat, but he has offered no approach. The Obama and Bush administrations got nowhere by isolating the reclusive nation, which has been propped up with food and fuel from the Chinese government. At this juncture, only a new round of engagement, backed by tougher sanctions, may hold any promise. North Korea now possesses the fuel for perhaps as many as 21 nuclear weapons and is steadily building its ability to deliver them with missiles. Still, some experts believe that it may be open to engaging with Mr. Trump, who during the campaign said he was willing to meet the regime’s leader, Kim Jong-un.', 'Y'),
(18, '2017-02-21 04:22:03', 9, 'Why the Iran Nuclear Deal Must Stand', 'President Trump had a subdued response to North Korea’s latest missile test this month, while he was playing host to Prime Minister Shinzo Abe of Japan and toasting newlyweds at his Mar-a-Lago club in Florida.\n\nWASHINGTON — Standing next to Israel’s prime minister, Benjamin Netanyahu, at a news conference Wednesday, President Trump inveighed against the nuclear agreement with Iran, declaring it “one of the worst deals ever made.” On this matter, Mr. Trump has been consistent — he has called the deal “terrible,” “a disgrace,” “stupid” and “catastrophic,” and said his No. 1 priority as president would be to dismantle it.\n\nSo it was striking last week when senior administration officials told the European Union’s foreign policy chief, Federica Mogherini, that President Trump was committed to fully carrying out the accord. The administration officials told the press the same thing in tamping down a fiery statement about Iran from Michael T. Flynn, when he was still Mr. Trump’s national security adviser.', 'N'),
(19, '2017-02-21 04:24:54', 10, 'Pressure on Wenger like never before', 'London - \"Every good story has an ending. Au revoir Arsene,\" read the words on a sticker on display in Borehamwood, a commuter town where north London side Arsenal enjoy strong support.\n\nThat sticker has been on display for several months and the words were positively polite compared to the torrent of criticism Arsene Wenger, Arsenal\'s manager for over 20 years, faced following the Gunners\' humiliating 5-1 loss away to Bayern Munich in the last 16 of the Champions League on Wednesday.', 'N'),
(20, '2017-02-21 04:25:44', 10, 'Benzema makes Real Madrid click - Zidane', 'Madrid - Real Madrid boss Zinedine ZIdane hailed the impact of Karim Benzema after his compatriot lifted the European champions from the early blow of conceding to beat Napoli 3-1 on Wednesday.', 'Y'),
(21, '2017-02-21 04:26:47', 8, 'Trump to roll back Obama’s climate', 'President Trump is preparing executive orders aimed at curtailing Obama-era policies on climate and water pollution, according to individuals briefed on the measures.\n\nWhile both directives will take time to implement, they will send an unmistakable signal that the new administration is determined to promote fossil-fuel production and economic activity even when those activities collide with some environmental safeguards. Individuals familiar with the proposals asked for anonymity to describe them in advance of their announcement, which could come as soon as this week.', 'Y'),
(22, '2017-02-21 04:27:42', 12, 'Obamacare’s enduring victory', 'What’s the holdup, House Republicans? During the Obama administration, you passed literally dozens of bills to repeal all or part of the Affordable Care Act — knowing that none had any chance of being signed into law. Now that Donald Trump is in the White House, why can’t you seem to pull the trigger?\n\nThat’s a rhetorical question, of course. Republicans see that they have two choices: They can snatch health insurance away from millions of people, or they can replace Obamacare with something that looks suspiciously like Obamacare-with-a-different-name. Wary of both alternatives, erstwhile anti-ACA zealots have spent the first month of the Trump administration doing little more than clearing their throats.', 'Y'),
(23, '2017-02-21 04:28:54', 12, 'For NBA players, the DeMarcus Cousins trade was a definite ‘wow’', 'Sunday’s NBA All-Star Game set records for scoring, LeBron James added to his career records in the contest while hitting a Steph Curry-esque half-court shot and, of course, Kevin Durant was briefly (and awkwardly) a teammate again of Russell Westbrook, but all that quickly became more or less forgotten. Shortly after the game ended, news emerged that DeMarcus Cousins was getting traded from the Kings to the Pelicans, and that blockbuster move has dominated NBA talk.', 'Y'),
(24, '2017-02-21 04:30:53', 12, 'Guest book is not a news trash', 'Please don\'t post news from internet, just write what\'s on your mind. Cheers!', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `gb_user`
--

CREATE TABLE `gb_user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `GROUP_ID` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gb_user`
--

INSERT INTO `gb_user` (`ID`, `NAME`, `EMAIL`, `PASSWORD`, `GROUP_ID`) VALUES
(4, 'Petr Cherkasov', 'petr@yandex.ru', '$2y$10$AdVMAoRMVqoHafvXP6K.d.6eYmOYhQWXzNcx.8vtUN.auw/S/lltO', 2),
(6, 'John Wall', 'john@yahoo.com', '$2y$10$qoi4s7rgP/iEHt4MtSJFAOn92wqUwDWEAn/ZDvG07yZf57aUtRTee', 2),
(8, 'Olga Kurenkova', 'olyala@gmail.com', '$2y$10$hDHZZXF07Aq30xlxfJSJ7eyLrxyktXOVpwb4HcL6rQySKc.svtusS', 2),
(9, 'Vera Afonina', 'vera@mail.ru', '$2y$10$TAvNjIvKiOnLgE5aWW.CAOEVqCRHXBVjoO5DWURDIUTe6s18SqGgi', 2),
(10, 'Trevor Smith', 'trev@smith.com', '$2y$10$/qkejJ.jpHmAdDTNHe/BxetFitHAE2yLr7ksLVaZ2cRglfwkrthSa', 2),
(12, 'Ivan Kuzin', 'corruptsouls@gmail.com', '$2y$10$NpmsI.TqUKp5coH/tRjgLOdm0XV7GAbyW3cUYBmQqDmy4//ZB5vVm', 1),
(20, 'Dmitry Kozlov', 'dk@mail.ru', '$2y$10$PLhgQpb91JUC9zUgwwPOaOnhuydO0/R5yES5URFE60JqoCiryyE3.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gb_user_groups`
--

CREATE TABLE `gb_user_groups` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gb_user_groups`
--

INSERT INTO `gb_user_groups` (`ID`, `NAME`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gb_messages`
--
ALTER TABLE `gb_messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gb_user`
--
ALTER TABLE `gb_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gb_user_groups`
--
ALTER TABLE `gb_user_groups`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gb_messages`
--
ALTER TABLE `gb_messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `gb_user`
--
ALTER TABLE `gb_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `gb_user_groups`
--
ALTER TABLE `gb_user_groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
