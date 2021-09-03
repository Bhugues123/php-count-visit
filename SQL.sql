CREATE TABLE `Compteur` (
  `Id` int(11) NOT NULL,
  `Page` text NOT NULL,
  `DateJour` text NOT NULL,
  `Nombre` text NOT NULL,
  `LasteIp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `Compteur`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `Compteur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

