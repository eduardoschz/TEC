-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema continentes
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `continentes` ;

-- -----------------------------------------------------
-- Schema continentes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `continentes` DEFAULT CHARACTER SET utf8 ;
USE `continentes` ;

-- -----------------------------------------------------
-- Table `continentes`.`paises`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `continentes`.`paises` ;

CREATE TABLE IF NOT EXISTS `continentes`.`paises` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pais` VARCHAR(45) NOT NULL,
  `fecha_indep` DATE NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `pais_UNIQUE` (`pais` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `continentes`.`estados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `continentes`.`estados` ;

CREATE TABLE IF NOT EXISTS `continentes`.`estados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(60) NOT NULL,
  `poblacion` INT NOT NULL,
  `pais_id` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_estados_paises_idx` (`pais_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_estados_paises`
    FOREIGN KEY (`pais_id`)
    REFERENCES `continentes`.`paises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `continentes`.`idiomas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `continentes`.`idiomas` ;

CREATE TABLE IF NOT EXISTS `continentes`.`idiomas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idioma` VARCHAR(45) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `continentes`.`paises_idiomas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `continentes`.`paises_idiomas` ;

CREATE TABLE IF NOT EXISTS `continentes`.`paises_idiomas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idioma_id` INT NOT NULL,
  `pais_id` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_paises_idiomas_idiomas1_idx` (`idioma_id` ASC),
  INDEX `fk_paises_idiomas_paises1_idx` (`pais_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_paises_idiomas_idiomas1`
    FOREIGN KEY (`idioma_id`)
    REFERENCES `continentes`.`idiomas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paises_idiomas_paises1`
    FOREIGN KEY (`pais_id`)
    REFERENCES `continentes`.`paises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `continentes`.`paises`
-- -----------------------------------------------------
START TRANSACTION;
USE `continentes`;
INSERT INTO `continentes`.`paises` (`id`, `pais`, `fecha_indep`, `status`, `created_at`, `updated_at`) VALUES (1, 'México', '1821-09-27', 1, '2019-4-2', '2019-4-2');
INSERT INTO `continentes`.`paises` (`id`, `pais`, `fecha_indep`, `status`, `created_at`, `updated_at`) VALUES (2, 'Canadá', '1810-01-01', 1, '2019-4-2', '2019-4-2');
INSERT INTO `continentes`.`paises` (`id`, `pais`, `fecha_indep`, `status`, `created_at`, `updated_at`) VALUES (3, 'Brasil', '1805-02-01', 1, '2019-4-2', '2019-4-2');
INSERT INTO `continentes`.`paises` (`id`, `pais`, `fecha_indep`, `status`, `created_at`, `updated_at`) VALUES (4, 'Colombia', '1825-01-01', 1, '2019-4-2', '2019-4-2');

COMMIT;


-- -----------------------------------------------------
-- Data for table `continentes`.`estados`
-- -----------------------------------------------------
START TRANSACTION;
USE `continentes`;
INSERT INTO `continentes`.`estados` (`id`, `estado`, `poblacion`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (1, 'Ciudad de México', 687, 1, 1, '2019-4-2', '2019-4-2');
INSERT INTO `continentes`.`estados` (`id`, `estado`, `poblacion`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (2, 'Cali', 513, 4, 1, '2019-4-2', '2019-4-2');
INSERT INTO `continentes`.`estados` (`id`, `estado`, `poblacion`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (3, 'Toronto', 698, 2, 1, '2019-4-2', '2019-4-2');
INSERT INTO `continentes`.`estados` (`id`, `estado`, `poblacion`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (4, 'San Pablo', 462, 3, 1, '2019-4-2', '2019-4-2');
INSERT INTO `continentes`.`estados` (`id`, `estado`, `poblacion`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (5, 'Jalisco', 622, 1, 1, '2019-4-2', '2019-4-2');

COMMIT;


-- -----------------------------------------------------
-- Data for table `continentes`.`idiomas`
-- -----------------------------------------------------
START TRANSACTION;
USE `continentes`;
INSERT INTO `continentes`.`idiomas` (`id`, `idioma`, `status`, `created_at`, `updated_at`) VALUES (1, 'Español', 1, '2019-04-09', '2019-04-09');
INSERT INTO `continentes`.`idiomas` (`id`, `idioma`, `status`, `created_at`, `updated_at`) VALUES (2, 'Inglés', 1, '2019-04-09', '2019-04-09');
INSERT INTO `continentes`.`idiomas` (`id`, `idioma`, `status`, `created_at`, `updated_at`) VALUES (3, 'Francés', 1, '2019-04-09', '2019-04-09');
INSERT INTO `continentes`.`idiomas` (`id`, `idioma`, `status`, `created_at`, `updated_at`) VALUES (4, 'Portugués', 1, '2019-04-09', '2019-04-09');

COMMIT;


-- -----------------------------------------------------
-- Data for table `continentes`.`paises_idiomas`
-- -----------------------------------------------------
START TRANSACTION;
USE `continentes`;
INSERT INTO `continentes`.`paises_idiomas` (`id`, `idioma_id`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (1, 1, 1, 1, '2019-04-09', '2019-04-09');
INSERT INTO `continentes`.`paises_idiomas` (`id`, `idioma_id`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (2, 1, 3, 1, '2019-04-09', '2019-04-09');
INSERT INTO `continentes`.`paises_idiomas` (`id`, `idioma_id`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (3, 4, 3, 1, '2019-04-09', '2019-04-09');
INSERT INTO `continentes`.`paises_idiomas` (`id`, `idioma_id`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (4, 2, 2, 1, '2019-04-09', '2019-04-09');
INSERT INTO `continentes`.`paises_idiomas` (`id`, `idioma_id`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (5, 3, 2, 1, '2019-04-09', '2019-04-09');
INSERT INTO `continentes`.`paises_idiomas` (`id`, `idioma_id`, `pais_id`, `status`, `created_at`, `updated_at`) VALUES (6, 1, 4, 1, '2019-04-10', '2019-04-10');

COMMIT;

