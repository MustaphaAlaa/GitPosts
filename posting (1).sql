-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 11:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posting`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_owner_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_owner_id`, `comment_post_id`, `comment_text`, `created_at`) VALUES
(1, 1, 1, 4, 'This is Second Comment', '2019-01-31 02:08:53'),
(2, 1, 1, 4, 'asdasdasdasd', '2019-01-31 02:09:32'),
(3, 1, 1, 3, 'Comment', '2019-01-31 02:09:53'),
(4, 1, 1, 4, 'MOstafa Alaa About to Made it', '2019-01-31 02:11:12'),
(5, 1, 1, 4, 'Will turned away, wordless. There was no use to argue. The wind was moving. It cut right through him. He went to the tree, a vaulting grey-green sentinel, and began to climb. Soon his hands were sticky with sap, and he was lost among the needles. Fear filled his gut like a meal he could not digest. He whispered a prayer to the nameless gods of the wood, and slipped his dirk free of its sheath. He put it between his teeth to keep both hands free for climbing. The taste of cold iron in his mouth gave him comfort. Down below, the lordling called out suddenly, “Who goes there?” Will heard uncertainty in the challenge. He stopped climbing; he listened; he watched. The woods gave answer: the rustle of leaves, the icy rush of the stream, a distant hoot of a snow owl. The Others made no sound. Will saw movement from the corner of his eye. Pale shapes gliding through the wood. He turned his head, glimpsed a white shadow in the darkness. Then it was gone. Branches stirred gently in the wind, scratching at one another with wooden fingers. Will opened his mouth to call down a warning, and the words seemed to freeze in his throat. Perhaps he was wrong. Perhaps it had only been a bird, a reflection on the snow, some trick of the moonlight. What had he seen, after all? “Will, where are you?” Ser Waymar called up. “Can you see anything?” He was turning in a slow circle, suddenly wary, his sword in hand. He must have felt them, as Will felt them. There was nothing to see. “Answer me! Why is it so cold?” It was cold. Shivering, Will clung more tightly to his perch. His face pressed hard against the trunk of the sentinel. He could feel the sweet, sticky sap on his cheek. A shadow emerged from the dark of the wood. It stood in front of Royce. Tall, it was, and gaunt and hard as old bones, with flesh pale as milk. Its armor seemed to change color as it moved; here it was white as new-fallen snow, there black as shadow, everywhere dappled with the deep grey-green of the trees. The patterns ran like moonlight on water with every step it took. Will heard the breath go out of Ser Waymar Royce in a long hiss. “Come no farther,” the lordling warned. His voice cracked like a boy’s. He threw the long sable cloak back over his shoulders, to free his arms for battle, and took his sword in both hands. The wind had stopped. It was very cold. The Other slid forward on silent feet. In its hand was a longsword like none that Will had ever seen. No human metal had gone into the forging of that blade. It was alive with moonlight, translucent, a shard of crystal so thin that it seemed almost to vanish when seen edge-on. There was a faint blue shimmer to the thing, a ghost-light that played around its edges, and somehow Will knew it was sharper than any razor. Ser Waymar met him bravely. “Dance with me then.” He lifted his sword high over his head, defiant. His hands trembled from the weight of it, or perhaps from the cold. Yet in that moment, Will thought, he was a boy no longer, but a man of the Night’s Watch Will turned away, wordless. There was no use to argue. The wind was moving. It cut right through him. He went to the tree, a vaulting grey-green sentinel, and began to climb. Soon his hands were sticky with sap, and he was lost among the needles. Fear filled his gut like a meal he could not digest. He whispered a prayer to the nameless gods of the wood, and slipped his dirk free of its sheath. He put it between his teeth to keep both hands free for climbing. The taste of cold iron in his mouth gave him comfort. Down below, the lordling called out suddenly, “Who goes there?” Will heard uncertainty in the challenge. He stopped climbing; he listened; he watched. The woods gave answer: the rustle of leaves, the icy rush of the stream, a distant hoot of a snow owl. The Others made no sound. Will saw movement from the corner of his eye. Pale shapes gliding through the wood. He turned his head, glimpsed a white shadow in the darkness. Then it was gone. Branches stirred gently in the wind, scratching at one another with wooden fingers. Will opened his mouth to call down a warning, and the words seemed to freeze in his throat. Perhaps he was wrong. Perhaps it had only been a bird, a reflection on the snow, some trick of the moonlight. What had he seen, after all? “Will, where are you?” Ser Waymar called up. “Can you see anything?” He was turning in a slow circle, suddenly wary, his sword in hand. He must have felt them, as Will felt them. There was nothing to see. “Answer me! Why is it so cold?” It was cold. Shivering, Will clung more tightly to his perch. His face pressed hard against the trunk of the sentinel. He could feel the sweet, sticky sap on his cheek. A shadow emerged from the dark of the wood. It stood in front of Royce. Tall, it was, and gaunt and hard as old bones, with flesh pale as milk. Its armor seemed to change color as it moved; here it was white as new-fallen snow, there black as shadow, everywhere dappled with the deep grey-green of the trees. The patterns ran like moonlight on water with every step it took. Will heard the breath go out of Ser Waymar Royce in a long hiss. “Come no farther,” the lordling warned. His voice cracked like a boy’s. He threw the long sable cloak back over his shoulders, to free his arms for battle, and took his sword in both hands. The wind had stopped. It was very cold. The Other slid forward on silent feet. In its hand was a longsword like none that Will had ever seen. No human metal had gone into the forging of that blade. It was alive with moonlight, translucent, a shard of crystal so thin that it seemed almost to vanish when seen edge-on. There was a faint blue shimmer to the thing, a ghost-light that played around its edges, and somehow Will knew it was sharper than any razor. Ser Waymar met him bravely. “Dance with me then.” He lifted his sword high over his head, defiant. His hands trembled from the weight of it, or perhaps from the cold. Yet in that moment, Will thought, he was a boy no longer, but a man of the Night’s Watch Will turned away, wordless. There was no use to argue. The wind was moving. It cut right through him. He went to the tree, a vaulting grey-green sentinel, and began to climb. Soon his hands were sticky with sap, and he was lost among the needles. Fear filled his gut like a meal he could not digest. He whispered a prayer to the nameless gods of the wood, and slipped his dirk free of its sheath. He put it between his teeth to keep both hands free for climbing. The taste of cold iron in his mouth gave him comfort. Down below, the lordling called out suddenly, “Who goes there?” Will heard uncertainty in the challenge. He stopped climbing; he listened; he watched. The woods gave answer: the rustle of leaves, the icy rush of the stream, a distant hoot of a snow owl. The Others made no sound. Will saw movement from the corner of his eye. Pale shapes gliding through the wood. He turned his head, glimpsed a white shadow in the darkness. Then it was gone. Branches stirred gently in the wind, scratching at one another with wooden fingers. Will opened his mouth to call down a warning, and the words seemed to freeze in his throat. Perhaps he was wrong. Perhaps it had only been a bird, a reflection on the snow, some trick of the moonlight. What had he seen, after all? “Will, where are you?” Ser Waymar called up. “Can you see anything?” He was turning in a slow circle, suddenly wary, his sword in hand. He must have felt them, as Will felt them. There was nothing to see. “Answer me! Why is it so cold?” It was cold. Shivering, Will clung more tightly to his perch. His face pressed hard against the trunk of the sentinel. He could feel the sweet, sticky sap on his cheek. A shadow emerged from the dark of the wood. It stood in front of Royce. Tall, it was, and gaunt and hard as old bones, with flesh pale as milk. Its armor seemed to change color as it moved; here it was white as new-fallen snow, there black as shadow, everywhere dappled with the deep grey-green of the trees. The patterns ran like moonlight on water with every step it took. Will heard the breath go out of Ser Waymar Royce in a long hiss. “Come no farther,” the lordling warned. His voice cracked like a boy’s. He threw the long sable cloak back over his shoulders, to free his arms for battle, and took his sword in both hands. The wind had stopped. It was very cold. The Other slid forward on silent feet. In its hand was a longsword like none that Will had ever seen. No human metal had gone into the forging of that blade. It was alive with moonlight, translucent, a shard of crystal so thin that it seemed almost to vanish when seen edge-on. There was a faint blue shimmer to the thing, a ghost-light that played around its edges, and somehow Will knew it was sharper than any razor. Ser Waymar met him bravely. “Dance with me then.” He lifted his sword high over his head, defiant. His hands trembled from the weight of it, or perhaps from the cold. Yet in that moment, Will thought, he was a boy no longer, but a man of the Night’s Watch Will turned away, wordless. There was no use to argue. The wind was moving. It cut right through him. He went to the tree, a vaulting grey-green sentinel, and began to climb. Soon his hands were sticky with sap, and he was lost among the needles. Fear filled his gut like a meal he could not digest. He whispered a prayer to the nameless gods of the wood, and slipped his dirk free of its sheath. He put it between his teeth to keep both hands free for climbing. The taste of cold iron in his mouth gave him comfort. Down below, the lordling called out suddenly, “Who goes there?” Will heard uncertainty in the challenge. He stopped climbing; he listened; he watched. The woods gave answer: the rustle of leaves, the icy rush of the stream, a distant hoot of a snow owl. The Others made no sound. Will saw movement from the corner of his eye. Pale shapes gliding through the wood. He turned his head, glimpsed a white shadow in the darkness. Then it was gone. Branches stirred gently in the wind, scratching at one another with wooden fingers. Will opened his mouth to call down a warning, and the words seemed to freeze in his throat. Perhaps he was wrong. Perhaps it had only been a bird, a reflection on the snow, some trick of the moonlight. What had he seen, after all? “Will, where are you?” Ser Waymar called up. “Can you see anything?” He was turning in a slow circle, suddenly wary, his sword in hand. He must have felt them, as Will felt them. There was nothing to see. “Answer me! Why is it so cold?” It was cold. Shivering, Will clung more tightly to his perch. His face pressed hard against the trunk of the sentinel. He could feel the sweet, sticky sap on his cheek. A shadow emerged from the dark of the wood. It stood in front of Royce. Tall, it was, and gaunt and hard as old bones, with flesh pale as milk. Its armor seemed to change color as it moved; here it was white as new-fallen snow, there black as shadow, everywhere dappled with the deep grey-green of the trees. The patterns ran like moonlight on water with every step it took. Will heard the breath go out of Ser Waymar Royce in a long hiss. “Come no farther,” the lordling warned. His voice cracked like a boy’s. He threw the long sable cloak back over his shoulders, to free his arms for battle, and took his sword in both hands. The wind had stopped. It was very cold. The Other slid forward on silent feet. In its hand was a longsword like none that Will had ever seen. No human metal had gone into the forging of that blade. It was alive with moonlight, translucent, a shard of crystal so thin that it seemed almost to vanish when seen edge-on. There was a faint blue shimmer to the thing, a ghost-light that played around its edges, and somehow Will knew it was sharper than any razor. Ser Waymar met him bravely. “Dance with me then.” He lifted his sword high over his head, defiant. His hands trembled from the weight of it, or perhaps from the cold. Yet in that moment, Will thought, he was a boy no longer, but a man of the Night’s Watch', '2019-01-31 02:13:16'),
(6, 1, 1, 4, 'asdasdas', '2019-01-31 02:14:47'),
(7, 3, 1, 4, 'asdasd', '2019-01-31 02:38:38'),
(8, 3, 1, 4, 'Perhaps he was wrong. Perhaps it had only been a bird, a reflection on the snow, some trick of the moonlight. What had he seen, after all? “Will, where are you?” Ser Waymar called up. “Can you see anything?” He was turning in a slow circle, suddenly wary, his sword in hand. He must have felt them, as Will felt them. There was nothing to see. “Answer me! Why is it so cold?” It was cold. Shivering, Will clung more tightly to his perch. His face pressed hard against the trunk of the sentinel. He could feel the sweet, sticky sap on his cheek. A shadow emerged from the dark of the wood. It stood in front of Royce. Tall, it was, and gaunt and hard as old bones, with flesh pale as milk. Its armor seemed to change color as it moved; here it was white as new-fallen snow, there black as shadow, everywhere dappled with the deep grey-green of the trees. The patterns ran like moonlight on water with every step it took. Will heard the breath go out of Ser Waymar Royce in a long hiss. “Come no farther,” the lordling warned. His voice cracked like a boy’s. He threw the long sable cloak back over his shoulders, to free his arms for battle, and took his sword in both hands. The wind had stopped. It was very cold. The Other slid forward on silent feet. In its hand was a longsword like none that Will had ever seen. No human metal had gone into the forging of that blade. It was alive with moonlight, translucent, a shard of crystal so thin that it seemed almost to vanish when seen edge-on. There was a faint blue shimmer to the thing, a ghost-light that played around its edges, and somehow Will knew it was sharper than any razor. Ser Waymar met him bravely. “Dance with me then.” He lifted his sword', '2019-01-31 12:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(3, 1, 'a', 'a', '2019-01-25 00:29:05'),
(4, 1, 'Hope', 'i hope that i&#39;ll be great in one day', '2019-01-30 23:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(90) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `password`, `created_at`) VALUES
(1, 'Mostafa', 'Alaa', 'mostafa@gmail.com', '01125042075', '$2y$10$C.XO9YKmE2240ofp4Dw1pevXpxTEX0KRzejHu3tRkLppG.eHAQsCi', '2019-01-25 00:28:49'),
(3, 'Brad', 'Traversy', 'brad@testge.com', '011250420752', '$2y$10$YGSzGqmvrQBAZ5q5NjKqdujRj/csvv2i2LVLp7PqK9/GcsO1Of2Ve', '2019-01-31 02:38:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_owner_id` (`post_owner_id`),
  ADD KEY `comment_post_id` (`comment_post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_owner_id`) REFERENCES `posts` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
