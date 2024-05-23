-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 01:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbskola`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` blob NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `gender`, `photo`, `description`, `quantity`, `price`) VALUES
(1, 'Pangolin', 'Male', '', 'Pangolins, sometimes known as scaly anteaters, are mammals of the order Pholidota. The one extant family, the Manidae, has three genera: Manis, Phataginus, and Smutsia. Manis comprises four species found in Asia, while Phataginus and Smutsia include two species each, all found in sub-Saharan Africa.', 5, 1800),
(2, 'Vaquita', 'Female', '', 'Vaquitas, the rarest and smallest of all cetaceans (members of a certain order of aquatic mammals), inhabit only the waters in Mexico’s Gulf of California.', 10, 20000),
(3, 'Whooping Crane', 'Female', '', 'In 1938, the first year a population survey was conducted, only 29 whooping cranes remained in the wild. Three years later only 16 were left.', 3, 34000),
(4, 'Sea Otter', 'Male', '', 'The luxurious waterproof coat that insulates sea otters from the chilly waters they inhabit almost led to their extinction. A target of the commercial fur trade, the species was almost wiped out, its population reduced from an estimated 300,000 in the early 1700s to some 2,000 by 1911. That year an international ban on commercial hunting was enacted.', 7, 11000),
(5, 'Tasmanian Devil', 'Male', '', 'Between 1996 and 2008 the population of Tasmanian devils dropped some 60 percent because of a contagious cancer known as devil facial tumor disease. It continues to decimate populations of the species, which occurs only on the Australian island of Tasmania. There may be only 10,000 wild individuals remaining.', 2, 51000),
(6, 'Hawksbill Turtles', 'Female', '', 'Hawksbills are named for their narrow, pointed beak. They also have a distinctive pattern of overlapping scales on their shells that form a serrated-look on the edges. These colored and patterned shells make them highly-valuable and commonly sold as \"tortoiseshell\" in markets.\r\n\r\nHawksbills are found mainly throughout the world\'s tropical oceans, predominantly in coral reefs. They feed mainly on sponges by using their narrow pointed beaks to extract them from crevices on the reef, but also eat sea anemones and jellyfish.', 11, 17000),
(7, 'Yangtze Finless Porpoise', 'Female', '', 'The Yangtze River, the longest river in Asia, used to be one of the only two rivers in the world that was home to two different species of dolphin—the Yangtze finless porpoise and the Baiji dolphin. However, in 2006 the Baiji dolphin was declared functionally extinct. This was the first time in history that an entire species of dolphin had been wiped off the planet because of human activity. Its close cousin, the Yangtze finless porpoise, is known for its mischievous smile and has a level of intelligence comparable to that of a gorilla.', 1, 100000),
(8, 'Sunda Island Tiger', 'Male', '', 'The Sunda Island tiger is a subspecies of Panthera tigris, not a whole species by itself. This means their genes are a little different from those of tigers from other places. They are smaller than other tigers and more likely to have beards or manes of fur around their faces.', 12, 53000),
(9, 'Red Panda', 'Male', '', 'The red panda is slightly larger than a domestic cat with a bear-like body and thick russet fur. The belly and limbs are black, and there are white markings on the side of the head and above its small eyes. Red pandas are very skillful and acrobatic animals that predominantly stay in trees. Almost 50% of the red panda’s habitat is in the Eastern Himalayas. They use their long, bushy tails for balance and to cover themselves in winter, presumably for warmth. Primarily an herbivore, the name panda is said to come from the Nepali word ‘ponya,’ which means bamboo or plant eating animal.', 20, 20000),
(10, 'Fennec Fox', 'Female', '', 'Fennec foxes dwell in the sandy Sahara and elsewhere in North Africa. Their nocturnal habits help them deal with the searing heat of the desert environment, and some physical adaptations help as well.', 6, 61000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$VEK6wXomu0.KoA1X5By60Ow5g6CuPoi0rGf5Bdtl20IjTBo6g5h1e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
