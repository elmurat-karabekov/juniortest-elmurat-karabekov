DROP DATABASE IF EXISTS 'scandiweb';
CREATE DATABASE IF NOT EXISTS 'scandiweb';
use 'scandiweb';

DROP TABLE IF EXISTS 'productlist';
CREATE TABLE IF NOT EXISTS `productlist` (
  `id` int(11) NOT NULL,
  `sku` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `productType` varchar(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `sku`, `name`, `price`, `productType`, `size`, `weight`, `height`, `width`, `length`) VALUES
(1, 'JVC200123', 'Acme DISC', '1.00', 'DVD', 700, NULL, NULL, NULL, NULL),
(2, 'GGWP0007', 'War and Peace', '20.00', 'Book', NULL, 2, NULL, NULL, NULL),
(3, 'TR120555', 'Chair', '40.00', 'Furniture', NULL, NULL, 24, 45, 15),
(4, 'VJM2488123', 'Daft Punk', '10.15', 'DVD', 700, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

ALTER TABLE `productlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

