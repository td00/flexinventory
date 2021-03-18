--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' ,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' ,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `passwortcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwortcode_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`), UNIQUE (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `securitytokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(10) NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `securitytoken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flexuuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anzahl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soll_min_anzahl` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `typ` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rx` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tx` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tray_ids` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `range` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `industrial` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `singlemulti` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `steckertyp` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bezeichnung` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zulauf_anzahl` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zusatz`varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `kommentar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`), UNIQUE (`flexuuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;