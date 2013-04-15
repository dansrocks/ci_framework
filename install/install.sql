--
-- Fichero SQL con queries requeridas para la configuración inicial.
--

CREATE TABLE `sessions` (
  `session_id` CHAR(64) NOT NULL COMMENT 'ID de la sesión',
  `ip_address` VARCHAR(45) NOT NULL DEFAULT '' COMMENT 'Dirección IP del cliente',
  `user_agent` VARCHAR(250) NOT NULL DEFAULT '' COMMENT 'UserAgent del Navegador cliente',
  `last_activity` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
						COMMENT 'fecha de la última actividad en la web',
  `user_data` BINARY DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8