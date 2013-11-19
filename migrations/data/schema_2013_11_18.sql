SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `alba2` DEFAULT CHARACTER SET utf8 ;
USE `alba2` ;

-- -----------------------------------------------------
-- Table `alba2`.`estado_alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_alumno` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_alumno` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(60) NOT NULL,
  `nombre_interno` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `estado_alumno_unique` (`descripcion` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`tipo_documento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`tipo_documento` ;

CREATE TABLE IF NOT EXISTS `alba2`.`tipo_documento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(40) NOT NULL,
  `abreviatura` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `tipo_documento_unique` (`descripcion` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`estado_documento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_documento` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_documento` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `orden` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`sexo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`sexo` ;

CREATE TABLE IF NOT EXISTS `alba2`.`sexo` (
  `id` INT NOT NULL,
  `abreviatura` VARCHAR(10) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`persona` ;

CREATE TABLE IF NOT EXISTS `alba2`.`persona` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `apellido` VARCHAR(30) NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `tipo_documento_id` INT(11) NOT NULL,
  `numero_documento` VARCHAR(30) NOT NULL,
  `estado_documento_id` INT NOT NULL,
  `sexo_id` INT NOT NULL,
  `fecha_nacimiento` DATE NULL DEFAULT NULL,
  `lugar_nacimiento` VARCHAR(255) NULL,
  `telefono` VARCHAR(60) NULL DEFAULT NULL,
  `telefono_alternativo` VARCHAR(60) NULL DEFAULT NULL,
  `email` VARCHAR(99) NULL DEFAULT NULL,
  `fecha_alta` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_filename` VARCHAR(255) NULL,
  `observaciones` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `persona_unique` (`tipo_documento_id` ASC, `numero_documento` ASC),
  INDEX `fk_personas_estados_documento1_idx` (`estado_documento_id` ASC),
  INDEX `fk_personas_sexos1_idx` (`sexo_id` ASC),
  CONSTRAINT `personas_tipo_documento_fk`
    FOREIGN KEY (`tipo_documento_id`)
    REFERENCES `alba2`.`tipo_documento` (`id`),
  CONSTRAINT `fk_personas_estados_documento1`
    FOREIGN KEY (`estado_documento_id`)
    REFERENCES `alba2`.`estado_documento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personas_sexos1`
    FOREIGN KEY (`sexo_id`)
    REFERENCES `alba2`.`sexo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`alumno` ;

CREATE TABLE IF NOT EXISTS `alba2`.`alumno` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `persona_id` INT(11) NOT NULL,
  `codigo` VARCHAR(30) NOT NULL,
  `estado_id` INT(11) NOT NULL,
  `fecha_alta` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `alumno_unique` (`codigo` ASC),
  INDEX `alumnos_persona_fk_idx` (`persona_id` ASC),
  INDEX `alumnos_estado_fk_idx` (`estado_id` ASC),
  CONSTRAINT `alumnos_estado_fk`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_alumno` (`id`),
  CONSTRAINT `alumnos_persona_fk`
    FOREIGN KEY (`persona_id`)
    REFERENCES `alba2`.`persona` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`alumno_estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`alumno_estado` ;

CREATE TABLE IF NOT EXISTS `alba2`.`alumno_estado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `alumno_id` INT(11) NOT NULL,
  `estado_id` INT(11) NOT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `alumnos_estados_alumno_fk_idx` (`alumno_id` ASC),
  INDEX `alumnos_estados_estado_fk_idx` (`estado_id` ASC),
  CONSTRAINT `alumnos_estados_alumno_fk`
    FOREIGN KEY (`alumno_id`)
    REFERENCES `alba2`.`alumno` (`id`),
  CONSTRAINT `alumnos_estados_estado_fk`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_alumno` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`estado_ciclo_lectivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_ciclo_lectivo` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_ciclo_lectivo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(60) NULL DEFAULT NULL,
  `nombre_interno` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `estado_ciclo_lectivo_unique` (`descripcion` ASC),
  UNIQUE INDEX `estado_ciclo_lectivo__nombre_interno_unique` (`nombre_interno` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`nivel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`nivel` ;

CREATE TABLE IF NOT EXISTS `alba2`.`nivel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`ciclo_lectivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`ciclo_lectivo` ;

CREATE TABLE IF NOT EXISTS `alba2`.`ciclo_lectivo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `anio` SMALLINT(6) NOT NULL,
  `nivel_id` INT(11) NOT NULL,
  `descripcion` VARCHAR(60) NULL DEFAULT NULL,
  `fecha_inicio` DATE NULL DEFAULT NULL,
  `fecha_fin` DATE NULL DEFAULT NULL,
  `estado_id` INT(11) NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ciclo_lectivo_unique` (`anio` ASC),
  INDEX `ciclos_lectivos_nivel_fk_idx` (`nivel_id` ASC),
  INDEX `ciclos_lectivos_estado_fk_idx` (`estado_id` ASC),
  CONSTRAINT `ciclos_lectivos_estado_fk`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_ciclo_lectivo` (`id`),
  CONSTRAINT `ciclos_lectivos_nivel_fk`
    FOREIGN KEY (`nivel_id`)
    REFERENCES `alba2`.`nivel` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`ciclo_lectivo_estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`ciclo_lectivo_estado` ;

CREATE TABLE IF NOT EXISTS `alba2`.`ciclo_lectivo_estado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ciclo_lectivo_id` INT(11) NOT NULL,
  `estado_id` INT(11) NOT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `ciclos_lectivos_estados_ciclo_lectivo_fk_idx` (`ciclo_lectivo_id` ASC),
  INDEX `ciclos_lectivos_estados_estado_fk_idx` (`estado_id` ASC),
  CONSTRAINT `ciclos_lectivos_estados_ciclo_lectivo_fk`
    FOREIGN KEY (`ciclo_lectivo_id`)
    REFERENCES `alba2`.`ciclo_lectivo` (`id`),
  CONSTRAINT `ciclos_lectivos_estados_estado_fk`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_ciclo_lectivo` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`pais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`pais` ;

CREATE TABLE IF NOT EXISTS `alba2`.`pais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `codigo` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `pais_unique` (`nombre` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 253
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`provincia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`provincia` ;

CREATE TABLE IF NOT EXISTS `alba2`.`provincia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `pais_id` INT(11) NOT NULL,
  `nombre` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `provincia_unique` (`pais_id` ASC, `nombre` ASC),
  CONSTRAINT `provincias_pais_fk`
    FOREIGN KEY (`pais_id`)
    REFERENCES `alba2`.`pais` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`ciudad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`ciudad` ;

CREATE TABLE IF NOT EXISTS `alba2`.`ciudad` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `provincia_id` INT(11) NOT NULL,
  `nombre` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ciudad_unique` (`provincia_id` ASC, `nombre` ASC),
  CONSTRAINT `ciudades_provincia_fk`
    FOREIGN KEY (`provincia_id`)
    REFERENCES `alba2`.`provincia` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 20333
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`tipo_gestion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`tipo_gestion` ;

CREATE TABLE IF NOT EXISTS `alba2`.`tipo_gestion` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `descripcion_UNIQUE` (`descripcion` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`dependencia_organizativa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`dependencia_organizativa` ;

CREATE TABLE IF NOT EXISTS `alba2`.`dependencia_organizativa` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(99) NOT NULL,
  `dependencia_padre_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dependencias_organizativas_dependencias_organizativas1_idx` (`dependencia_padre_id` ASC),
  CONSTRAINT `fk_dependencias_organizativas_dependencias_organizativas1`
    FOREIGN KEY (`dependencia_padre_id`)
    REFERENCES `alba2`.`dependencia_organizativa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`establecimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`establecimiento` ;

CREATE TABLE IF NOT EXISTS `alba2`.`establecimiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_gestion_id` INT NOT NULL,
  `codigo` VARCHAR(99) NULL,
  `nombre` VARCHAR(99) NOT NULL,
  `numero` VARCHAR(20) NULL,
  `telefono` VARCHAR(60) NULL DEFAULT NULL,
  `telefono_alternativo` VARCHAR(60) NULL DEFAULT NULL,
  `fax` VARCHAR(60) NULL DEFAULT NULL,
  `email` VARCHAR(99) NULL DEFAULT NULL,
  `sitio_web` VARCHAR(99) NULL DEFAULT NULL,
  `dependencia_organizativa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_establecimientos_tipos_gestion1_idx` (`tipo_gestion_id` ASC),
  INDEX `fk_establecimientos_dependencias_organizativas1_idx` (`dependencia_organizativa_id` ASC),
  CONSTRAINT `fk_establecimientos_tipos_gestion1`
    FOREIGN KEY (`tipo_gestion_id`)
    REFERENCES `alba2`.`tipo_gestion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_establecimientos_dependencias_organizativas1`
    FOREIGN KEY (`dependencia_organizativa_id`)
    REFERENCES `alba2`.`dependencia_organizativa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`plan_estudio_anio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`plan_estudio_anio` ;

CREATE TABLE IF NOT EXISTS `alba2`.`plan_estudio_anio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(30) NOT NULL,
  `plan_estudio_id` INT NOT NULL,
  `orden` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'es la tabla que configura los nombres de los años que se dan en cada plan de estudios';


-- -----------------------------------------------------
-- Table `alba2`.`tipo_responsable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`tipo_responsable` ;

CREATE TABLE IF NOT EXISTS `alba2`.`tipo_responsable` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `parentezco_unique` (`descripcion` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`persona_domicilio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`persona_domicilio` ;

CREATE TABLE IF NOT EXISTS `alba2`.`persona_domicilio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `persona_id` INT(11) NOT NULL,
  `direccion` VARCHAR(99) NOT NULL,
  `cp` VARCHAR(30) NULL DEFAULT NULL,
  `pais_id` INT(11) NULL DEFAULT NULL,
  `provincia_id` INT(11) NULL DEFAULT NULL,
  `ciudad_id` INT(11) NULL DEFAULT NULL,
  `principal` TINYINT(1) NOT NULL DEFAULT '1',
  `observaciones` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `personas_domicilio_persona_fk_idx` (`persona_id` ASC),
  INDEX `personas_domicilio_pais_fk_idx` (`pais_id` ASC),
  INDEX `personas_domicilio_provincia_fk_idx` (`provincia_id` ASC),
  INDEX `personas_domicilio_ciudad_fk_idx` (`ciudad_id` ASC),
  CONSTRAINT `personas_domicilio_ciudad_fk`
    FOREIGN KEY (`ciudad_id`)
    REFERENCES `alba2`.`ciudad` (`id`),
  CONSTRAINT `personas_domicilio_pais_fk`
    FOREIGN KEY (`pais_id`)
    REFERENCES `alba2`.`pais` (`id`),
  CONSTRAINT `personas_domicilio_persona_fk`
    FOREIGN KEY (`persona_id`)
    REFERENCES `alba2`.`persona` (`id`),
  CONSTRAINT `personas_domicilio_provincia_fk`
    FOREIGN KEY (`provincia_id`)
    REFERENCES `alba2`.`provincia` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`actividad_responsable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`actividad_responsable` ;

CREATE TABLE IF NOT EXISTS `alba2`.`actividad_responsable` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`nivel_instruccion_alcanzado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`nivel_instruccion_alcanzado` ;

CREATE TABLE IF NOT EXISTS `alba2`.`nivel_instruccion_alcanzado` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`responsable_alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`responsable_alumno` ;

CREATE TABLE IF NOT EXISTS `alba2`.`responsable_alumno` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `persona_id` INT(11) NOT NULL,
  `alumno_id` INT(11) NOT NULL,
  `actividad_id` INT NOT NULL,
  `nivel_instruccion_alcanzado_id` INT NOT NULL,
  `tipo_responsable_id` INT(11) NULL DEFAULT NULL,
  `ocupacion` VARCHAR(45) NULL,
  `autorizado_retirar` TINYINT(1) NOT NULL DEFAULT '0',
  `vive` TINYINT(1) NULL,
  `observaciones` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `responsables_alumnos_unique` (`persona_id` ASC, `alumno_id` ASC),
  INDEX `responsables_alumnos_alumno_fk_idx` (`alumno_id` ASC),
  INDEX `responsables_alumnos_parentezco_fk_idx` (`tipo_responsable_id` ASC),
  INDEX `fk_responsables_alumno_actividades_responsable1_idx` (`actividad_id` ASC),
  INDEX `fk_responsables_alumno_niveles_instruccion1_idx` (`nivel_instruccion_alcanzado_id` ASC),
  CONSTRAINT `responsables_alumnos_alumno_fk`
    FOREIGN KEY (`alumno_id`)
    REFERENCES `alba2`.`alumno` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `responsables_alumnos_parentezco_fk`
    FOREIGN KEY (`tipo_responsable_id`)
    REFERENCES `alba2`.`tipo_responsable` (`id`),
  CONSTRAINT `responsables_alumnos_persona_fk`
    FOREIGN KEY (`persona_id`)
    REFERENCES `alba2`.`persona` (`id`),
  CONSTRAINT `fk_responsables_alumno_actividades_responsable1`
    FOREIGN KEY (`actividad_id`)
    REFERENCES `alba2`.`actividad_responsable` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_responsables_alumno_niveles_instruccion1`
    FOREIGN KEY (`nivel_instruccion_alcanzado_id`)
    REFERENCES `alba2`.`nivel_instruccion_alcanzado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`sede`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`sede` ;

CREATE TABLE IF NOT EXISTS `alba2`.`sede` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `establecimiento_id` INT(11) NOT NULL,
  `codigo` VARCHAR(99) NULL DEFAULT NULL,
  `nombre` VARCHAR(99) NOT NULL,
  `telefono` VARCHAR(60) NULL DEFAULT NULL,
  `telefono_alternativo` VARCHAR(60) NULL DEFAULT NULL,
  `fax` VARCHAR(60) NULL DEFAULT NULL,
  `principal` TINYINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `sede_unique` (`establecimiento_id` ASC, `nombre` ASC),
  CONSTRAINT `sedes_establecimiento_fk`
    FOREIGN KEY (`establecimiento_id`)
    REFERENCES `alba2`.`establecimiento` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`turno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`turno` ;

CREATE TABLE IF NOT EXISTS `alba2`.`turno` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `turno_unique` (`descripcion` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`estado_plan_estudio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_plan_estudio` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_plan_estudio` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(99) NOT NULL,
  `nombre_interno` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`plan_estudio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`plan_estudio` ;

CREATE TABLE IF NOT EXISTS `alba2`.`plan_estudio` (
  `id` INT NOT NULL,
  `nivel_id` INT NOT NULL,
  `codigo` VARCHAR(45) NOT NULL,
  `nombre_completo` VARCHAR(255) NOT NULL,
  `nombre_corto` VARCHAR(99) NOT NULL,
  `duracion` TINYINT NOT NULL,
  `estado_id` INT NOT NULL,
  `plan_estudio_origen_id` INT NULL DEFAULT NULL COMMENT 'Indica el plan de estudios original\nen caso de que el actual haya sido \ncreado a partir de otro existente.',
  `resoluciones` VARCHAR(255) NULL,
  `normativas` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_planes_estudio_1_idx` (`nivel_id` ASC),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  INDEX `fk_planes_estudio_estados_planes_estudio1_idx` (`estado_id` ASC),
  INDEX `fk_planes_estudio_planes_estudio1_idx` (`plan_estudio_origen_id` ASC),
  CONSTRAINT `fk_planes_estudio_1`
    FOREIGN KEY (`nivel_id`)
    REFERENCES `alba2`.`nivel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planes_estudio_estados_planes_estudio1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_plan_estudio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planes_estudio_planes_estudio1`
    FOREIGN KEY (`plan_estudio_origen_id`)
    REFERENCES `alba2`.`plan_estudio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`seccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`seccion` ;

CREATE TABLE IF NOT EXISTS `alba2`.`seccion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sede_id` INT(11) NOT NULL,
  `plan_estudio_id` INT NOT NULL,
  `ciclo_lectivo_id` INT(11) NOT NULL,
  `turno_id` INT(11) NOT NULL,
  `anio_id` INT(11) NOT NULL,
  `identificador` VARCHAR(30) NOT NULL,
  `cupo_maximo` SMALLINT(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `seccion_unique` (`sede_id` ASC, `ciclo_lectivo_id` ASC, `turno_id` ASC, `anio_id` ASC, `identificador` ASC),
  INDEX `secciones_turno_fk_idx` (`turno_id` ASC),
  INDEX `secciones_grado_fk_idx` (`anio_id` ASC),
  INDEX `fk_secciones_planes_estudio1_idx` (`plan_estudio_id` ASC),
  CONSTRAINT `secciones_grado_fk`
    FOREIGN KEY (`anio_id`)
    REFERENCES `alba2`.`plan_estudio_anio` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `secciones_sede_fk`
    FOREIGN KEY (`sede_id`)
    REFERENCES `alba2`.`sede` (`id`),
  CONSTRAINT `secciones_turno_fk`
    FOREIGN KEY (`turno_id`)
    REFERENCES `alba2`.`turno` (`id`),
  CONSTRAINT `fk_secciones_planes_estudio1`
    FOREIGN KEY (`plan_estudio_id`)
    REFERENCES `alba2`.`plan_estudio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`sede_domicilio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`sede_domicilio` ;

CREATE TABLE IF NOT EXISTS `alba2`.`sede_domicilio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sede_id` INT(11) NOT NULL,
  `direccion` VARCHAR(99) NOT NULL,
  `cp` VARCHAR(30) NULL DEFAULT NULL,
  `pais_id` INT(11) NULL DEFAULT NULL,
  `provincia_id` INT(11) NULL DEFAULT NULL,
  `ciudad_id` INT(11) NULL DEFAULT NULL,
  `principal` TINYINT(1) NOT NULL DEFAULT '1',
  `observaciones` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `sede_domicilio_unique` (`sede_id` ASC),
  INDEX `sedes_domicilio_pais_fk_idx` (`pais_id` ASC),
  INDEX `sedes_domicilio_provincia_fk_idx` (`provincia_id` ASC),
  INDEX `sedes_domicilio_ciudad_fk_idx` (`ciudad_id` ASC),
  CONSTRAINT `sedes_domicilio_ciudad_fk`
    FOREIGN KEY (`ciudad_id`)
    REFERENCES `alba2`.`ciudad` (`id`),
  CONSTRAINT `sedes_domicilio_pais_fk`
    FOREIGN KEY (`pais_id`)
    REFERENCES `alba2`.`pais` (`id`),
  CONSTRAINT `sedes_domicilio_provincia_fk`
    FOREIGN KEY (`provincia_id`)
    REFERENCES `alba2`.`provincia` (`id`),
  CONSTRAINT `sedes_domicilio_sede_fk`
    FOREIGN KEY (`sede_id`)
    REFERENCES `alba2`.`sede` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`servicio_salud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`servicio_salud` ;

CREATE TABLE IF NOT EXISTS `alba2`.`servicio_salud` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(30) NULL DEFAULT NULL,
  `abreviatura` VARCHAR(30) NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `email` VARCHAR(99) NULL DEFAULT NULL,
  `sitio_web` VARCHAR(99) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 262
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`servicio_salud_contacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`servicio_salud_contacto` ;

CREATE TABLE IF NOT EXISTS `alba2`.`servicio_salud_contacto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `servicio_salud_id` INT(11) NOT NULL,
  `direccion` VARCHAR(99) NOT NULL,
  `cp` VARCHAR(30) NULL DEFAULT NULL,
  `pais_id` INT(11) NULL DEFAULT NULL,
  `provincia_id` INT(11) NULL DEFAULT NULL,
  `ciudad_id` INT(11) NULL DEFAULT NULL,
  `telefono` VARCHAR(60) NOT NULL,
  `telefono_alternativo` VARCHAR(60) NULL DEFAULT NULL,
  `contacto_preferido` TINYINT(1) NULL,
  `observaciones` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `servicios_salud_contacto_servicio_salud_fk_idx` (`servicio_salud_id` ASC),
  INDEX `servicios_salud_contacto_pais_fk_idx` (`pais_id` ASC),
  INDEX `servicios_salud_contacto_provincia_fk_idx` (`provincia_id` ASC),
  INDEX `servicios_salud_contacto_ciudad_fk_idx` (`ciudad_id` ASC),
  CONSTRAINT `servicios_salud_contacto_ciudad_fk`
    FOREIGN KEY (`ciudad_id`)
    REFERENCES `alba2`.`ciudad` (`id`),
  CONSTRAINT `servicios_salud_contacto_pais_fk`
    FOREIGN KEY (`pais_id`)
    REFERENCES `alba2`.`pais` (`id`),
  CONSTRAINT `servicios_salud_contacto_provincia_fk`
    FOREIGN KEY (`provincia_id`)
    REFERENCES `alba2`.`provincia` (`id`),
  CONSTRAINT `servicios_salud_contacto_servicio_salud_fk`
    FOREIGN KEY (`servicio_salud_id`)
    REFERENCES `alba2`.`servicio_salud` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4809
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`asignatura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`asignatura` ;

CREATE TABLE IF NOT EXISTS `alba2`.`asignatura` (
  `id` INT NOT NULL,
  `codigo` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(99) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`plan_estudio_asignatura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`plan_estudio_asignatura` ;

CREATE TABLE IF NOT EXISTS `alba2`.`plan_estudio_asignatura` (
  `id` INT NOT NULL,
  `plan_estudio_id` INT NOT NULL,
  `asignatura_id` INT NOT NULL,
  `anio_id` INT NOT NULL,
  `carga_horaria_semanal` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_planes_estudio_materias_planes_estudio1_idx` (`plan_estudio_id` ASC),
  INDEX `fk_planes_estudio_materias_materias1_idx` (`asignatura_id` ASC),
  INDEX `fk_planes_estudio_materias_grados1_idx` (`anio_id` ASC),
  CONSTRAINT `fk_planes_estudio_materias_planes_estudio1`
    FOREIGN KEY (`plan_estudio_id`)
    REFERENCES `alba2`.`plan_estudio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planes_estudio_materias_materias1`
    FOREIGN KEY (`asignatura_id`)
    REFERENCES `alba2`.`asignatura` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planes_estudio_materias_grados1`
    FOREIGN KEY (`anio_id`)
    REFERENCES `alba2`.`plan_estudio_anio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`plan_estudio_estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`plan_estudio_estado` ;

CREATE TABLE IF NOT EXISTS `alba2`.`plan_estudio_estado` (
  `id` INT NOT NULL,
  `plan_estudio_id` INT NOT NULL,
  `estado_id` INT NOT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_planes_estudio_estados_planes_estudio2_idx` (`plan_estudio_id` ASC),
  INDEX `fk_planes_estudio_estados_estados_planes_estudio1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_planes_estudio_estados_planes_estudio2`
    FOREIGN KEY (`plan_estudio_id`)
    REFERENCES `alba2`.`plan_estudio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_planes_estudio_estados_estados_planes_estudio1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_plan_estudio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`estado_inscripcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_inscripcion` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_inscripcion` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `descripcion_UNIQUE` (`descripcion` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`condicion_inscripcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`condicion_inscripcion` ;

CREATE TABLE IF NOT EXISTS `alba2`.`condicion_inscripcion` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL COMMENT 'Repitiente\nReinscripto\nIngresante\nPromovido\nEn Compensación',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`inscripcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`inscripcion` ;

CREATE TABLE IF NOT EXISTS `alba2`.`inscripcion` (
  `id` INT NOT NULL,
  `alumno_id` INT NOT NULL,
  `anio_id` INT NOT NULL,
  `turno_id` INT NOT NULL COMMENT 'Turno de preferencia\n',
  `ciclo_lectivo_id` INT NOT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_id` INT NOT NULL,
  `sede_id` INT NOT NULL,
  `plan_estudio_id` INT NOT NULL,
  `condicion_id` INT NULL COMMENT 'Por ejemplo si es \nhermano de un alumno\nactual o hijo de \nun docente',
  `observaciones` VARCHAR(999) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_inscripciones_alumnos1_idx` (`alumno_id` ASC),
  INDEX `fk_inscripciones_grados1_idx` (`anio_id` ASC),
  INDEX `fk_inscripciones_turnos1_idx` (`turno_id` ASC),
  INDEX `fk_inscripciones_estados_inscripcion1_idx` (`estado_id` ASC),
  INDEX `fk_inscripciones_sedes1_idx` (`sede_id` ASC),
  INDEX `fk_inscripciones_planes_estudio1_idx` (`plan_estudio_id` ASC),
  INDEX `fk_inscripciones_ciclos_lectivos1_idx` (`ciclo_lectivo_id` ASC),
  INDEX `fk_inscripciones_condiciones_inscripcion1_idx` (`condicion_id` ASC),
  CONSTRAINT `fk_inscripciones_alumnos1`
    FOREIGN KEY (`alumno_id`)
    REFERENCES `alba2`.`alumno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_grados1`
    FOREIGN KEY (`anio_id`)
    REFERENCES `alba2`.`plan_estudio_anio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_turnos1`
    FOREIGN KEY (`turno_id`)
    REFERENCES `alba2`.`turno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_estados_inscripcion1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_inscripcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_sedes1`
    FOREIGN KEY (`sede_id`)
    REFERENCES `alba2`.`sede` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_planes_estudio1`
    FOREIGN KEY (`plan_estudio_id`)
    REFERENCES `alba2`.`plan_estudio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_ciclos_lectivos1`
    FOREIGN KEY (`ciclo_lectivo_id`)
    REFERENCES `alba2`.`ciclo_lectivo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_condiciones_inscripcion1`
    FOREIGN KEY (`condicion_id`)
    REFERENCES `alba2`.`condicion_inscripcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`inscripcion_estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`inscripcion_estado` ;

CREATE TABLE IF NOT EXISTS `alba2`.`inscripcion_estado` (
  `id` INT NOT NULL,
  `inscripcion_id` INT NOT NULL,
  `estado_id` INT NOT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_inscripciones_estados_inscripciones1_idx` (`inscripcion_id` ASC),
  INDEX `fk_inscripciones_estados_estados_inscripcion1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_inscripciones_estados_inscripciones1`
    FOREIGN KEY (`inscripcion_id`)
    REFERENCES `alba2`.`inscripcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripciones_estados_estados_inscripcion1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_inscripcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`alumno_seccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`alumno_seccion` ;

CREATE TABLE IF NOT EXISTS `alba2`.`alumno_seccion` (
  `id` INT NOT NULL,
  `alumno_id` INT NOT NULL,
  `seccion_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_matricula_secciones1_idx` (`seccion_id` ASC),
  INDEX `fk_matricula_alumnos1_idx` (`alumno_id` ASC),
  CONSTRAINT `fk_matricula_secciones1`
    FOREIGN KEY (`seccion_id`)
    REFERENCES `alba2`.`seccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_alumnos1`
    FOREIGN KEY (`alumno_id`)
    REFERENCES `alba2`.`alumno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`periodo_nivel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`periodo_nivel` ;

CREATE TABLE IF NOT EXISTS `alba2`.`periodo_nivel` (
  `id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`tipo_periodo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`tipo_periodo` ;

CREATE TABLE IF NOT EXISTS `alba2`.`tipo_periodo` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `periodos_por_ciclo` TINYINT NOT NULL,
  `nivel_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tipos_periodo_niveles1_idx` (`nivel_id` ASC),
  CONSTRAINT `fk_tipos_periodo_niveles1`
    FOREIGN KEY (`nivel_id`)
    REFERENCES `alba2`.`nivel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`estado_periodo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_periodo` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_periodo` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`periodo_ciclo_lectivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`periodo_ciclo_lectivo` ;

CREATE TABLE IF NOT EXISTS `alba2`.`periodo_ciclo_lectivo` (
  `id` INT NOT NULL,
  `ciclo_lectivo_id` INT(11) NOT NULL,
  `tipo_periodo_id` INT NOT NULL,
  `fecha_inicio` DATE NULL,
  `fecha_fin` DATE NULL,
  `orden` TINYINT NOT NULL,
  `estado_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_periodos_ciclos_lectivos1_idx` (`ciclo_lectivo_id` ASC),
  INDEX `fk_periodos_tipos_periodo1_idx` (`tipo_periodo_id` ASC),
  INDEX `fk_periodos_estados_periodo1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_periodos_ciclos_lectivos1`
    FOREIGN KEY (`ciclo_lectivo_id`)
    REFERENCES `alba2`.`ciclo_lectivo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_periodos_tipos_periodo1`
    FOREIGN KEY (`tipo_periodo_id`)
    REFERENCES `alba2`.`tipo_periodo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_periodos_estados_periodo1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_periodo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alba2`.`docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`docente` ;

CREATE TABLE IF NOT EXISTS `alba2`.`docente` (
  `id` INT NOT NULL,
  `personas_id` INT(11) NOT NULL,
  `codigo` VARCHAR(45) NULL,
  `fecha_alta` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_docentes_personas1_idx` (`personas_id` ASC),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  CONSTRAINT `fk_docentes_personas1`
    FOREIGN KEY (`personas_id`)
    REFERENCES `alba2`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`estado_docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_docente` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_docente` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`docente_estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`docente_estado` ;

CREATE TABLE IF NOT EXISTS `alba2`.`docente_estado` (
  `id` INT NOT NULL,
  `estado_id` INT NOT NULL,
  `docente_id` INT NOT NULL,
  `fecha` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `fk_estados_docente_has_docentes_docentes1_idx` (`docente_id` ASC),
  INDEX `fk_estados_docente_has_docentes_estados_docente1_idx` (`estado_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_estados_docente_has_docentes_estados_docente1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_docente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estados_docente_has_docentes_docentes1`
    FOREIGN KEY (`docente_id`)
    REFERENCES `alba2`.`docente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`tipo_designacion_docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`tipo_designacion_docente` ;

CREATE TABLE IF NOT EXISTS `alba2`.`tipo_designacion_docente` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`estado_designacion_docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_designacion_docente` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_designacion_docente` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`designacion_docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`designacion_docente` ;

CREATE TABLE IF NOT EXISTS `alba2`.`designacion_docente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `seccion_id` INT(11) NOT NULL,
  `plan_estudio_asignatura_id` INT NOT NULL,
  `tipo_designacion_id` INT NOT NULL COMMENT '- Titular\n- Interino\n- Suplente',
  `fecha_inicio` DATE NULL,
  `fecha_fin` DATE NULL,
  `estado_id` INT NOT NULL,
  INDEX `fk_docentes_has_secciones_secciones1_idx` (`seccion_id` ASC),
  INDEX `fk_docentes_has_secciones_docentes1_idx` (`docente_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_designacion_docentes_tipos_designacion_docentes1_idx` (`tipo_designacion_id` ASC),
  INDEX `fk_designacion_docentes_estados_designacion_docentes1_idx` (`estado_id` ASC),
  INDEX `fk_designacion_docentes_planes_estudio_materias1_idx` (`plan_estudio_asignatura_id` ASC),
  CONSTRAINT `fk_docentes_has_secciones_docentes1`
    FOREIGN KEY (`docente_id`)
    REFERENCES `alba2`.`docente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_docentes_has_secciones_secciones1`
    FOREIGN KEY (`seccion_id`)
    REFERENCES `alba2`.`seccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_designacion_docentes_tipos_designacion_docentes1`
    FOREIGN KEY (`tipo_designacion_id`)
    REFERENCES `alba2`.`tipo_designacion_docente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_designacion_docentes_estados_designacion_docentes1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `alba2`.`estado_designacion_docente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_designacion_docentes_planes_estudio_materias1`
    FOREIGN KEY (`plan_estudio_asignatura_id`)
    REFERENCES `alba2`.`plan_estudio_asignatura` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`documentacion_inscripcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`documentacion_inscripcion` ;

CREATE TABLE IF NOT EXISTS `alba2`.`documentacion_inscripcion` (
  `id` INT NOT NULL,
  `inscripcion_id` INT NOT NULL,
  `documento_alumno` TINYINT(1) NOT NULL,
  `certificado_nacimiento` TINYINT(1) NOT NULL,
  `documento_responsables` TINYINT(1) NOT NULL,
  `certificado_vacunas` TINYINT(1) NOT NULL,
  `planilla_completa` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_documentacion_inscripcion_inscripciones1_idx` (`inscripcion_id` ASC),
  CONSTRAINT `fk_documentacion_inscripcion_inscripciones1`
    FOREIGN KEY (`inscripcion_id`)
    REFERENCES `alba2`.`inscripcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`estado_vacunacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`estado_vacunacion` ;

CREATE TABLE IF NOT EXISTS `alba2`.`estado_vacunacion` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`ficha_salud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`ficha_salud` ;

CREATE TABLE IF NOT EXISTS `alba2`.`ficha_salud` (
  `id` INT NOT NULL,
  `persona_id` INT(11) NOT NULL,
  `servicio_salud_id` INT(11) NULL,
  `numero_afiliado` VARCHAR(99) NULL,
  `estado_vacunacion_id` INT NOT NULL,
  `enfermedad` VARCHAR(255) NULL,
  `internacion` VARCHAR(255) NULL,
  `alergia` VARCHAR(255) NULL,
  `tratamiento` VARCHAR(255) NULL,
  `limitacion_fisica` VARCHAR(255) NULL,
  `otros` VARCHAR(255) NULL,
  `altura` VARCHAR(45) NULL,
  `peso` VARCHAR(45) NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_fichas_salud_personas1_idx` (`persona_id` ASC),
  INDEX `fk_fichas_salud_servicios_salud1_idx` (`servicio_salud_id` ASC),
  INDEX `fk_fichas_salud_estados_vacunacion1_idx` (`estado_vacunacion_id` ASC),
  CONSTRAINT `fk_fichas_salud_personas1`
    FOREIGN KEY (`persona_id`)
    REFERENCES `alba2`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fichas_salud_servicios_salud1`
    FOREIGN KEY (`servicio_salud_id`)
    REFERENCES `alba2`.`servicio_salud` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fichas_salud_estados_vacunacion1`
    FOREIGN KEY (`estado_vacunacion_id`)
    REFERENCES `alba2`.`estado_vacunacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`tipo_contacto_emergencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`tipo_contacto_emergencia` ;

CREATE TABLE IF NOT EXISTS `alba2`.`tipo_contacto_emergencia` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `orden` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = '- Médico\n- Familiar\n- Institución';


-- -----------------------------------------------------
-- Table `alba2`.`contacto_emergencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`contacto_emergencia` ;

CREATE TABLE IF NOT EXISTS `alba2`.`contacto_emergencia` (
  `id` INT NOT NULL,
  `ficha_salud_id` INT NOT NULL,
  `tipos_contacto_id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `domicilio` VARCHAR(99) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contactos_emergencia_fichas_salud1_idx` (`ficha_salud_id` ASC),
  INDEX `fk_contactos_emergencia_tipos_contacto_emergencia1_idx` (`tipos_contacto_id` ASC),
  CONSTRAINT `fk_contactos_emergencia_fichas_salud1`
    FOREIGN KEY (`ficha_salud_id`)
    REFERENCES `alba2`.`ficha_salud` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contactos_emergencia_tipos_contacto_emergencia1`
    FOREIGN KEY (`tipos_contacto_id`)
    REFERENCES `alba2`.`tipo_contacto_emergencia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`inscripcion_informacion_adicional`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`inscripcion_informacion_adicional` ;

CREATE TABLE IF NOT EXISTS `alba2`.`inscripcion_informacion_adicional` (
  `id` INT NOT NULL,
  `inscripcion_id` INT NOT NULL,
  `cantidad_hermanos` TINYINT NULL,
  `hermanos_en_establecimiento` TINYINT NULL,
  `distancia_establecimiento` VARCHAR(45) NULL,
  `habitantes_hogar` TINYINT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_inscripciones_informacion_adicional_inscripciones1_idx` (`inscripcion_id` ASC),
  UNIQUE INDEX `inscripcion_id_UNIQUE` (`inscripcion_id` ASC),
  CONSTRAINT `fk_inscripciones_informacion_adicional_inscripciones1`
    FOREIGN KEY (`inscripcion_id`)
    REFERENCES `alba2`.`inscripcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`establecimiento_procedencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`establecimiento_procedencia` ;

CREATE TABLE IF NOT EXISTS `alba2`.`establecimiento_procedencia` (
  `id` INT NOT NULL,
  `inscripcion_id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `nivel_id` INT(11) NULL,
  `tipo_gestion_id` INT NULL,
  `pais_id` INT(11) NULL,
  `provincia_id` INT(11) NULL,
  `ciudad_id` INT(11) NULL,
  `establecimiento_id` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_establecimientos_procedencia_inscripciones1_idx` (`inscripcion_id` ASC),
  INDEX `fk_establecimientos_procedencia_paises1_idx` (`pais_id` ASC),
  INDEX `fk_establecimientos_procedencia_provincias1_idx` (`provincia_id` ASC),
  INDEX `fk_establecimientos_procedencia_ciudades1_idx` (`ciudad_id` ASC),
  INDEX `fk_establecimientos_procedencia_tipos_gestion1_idx` (`tipo_gestion_id` ASC),
  INDEX `fk_establecimientos_procedencia_niveles1_idx` (`nivel_id` ASC),
  INDEX `fk_establecimientos_procedencia_establecimientos1_idx` (`establecimiento_id` ASC),
  CONSTRAINT `fk_establecimientos_procedencia_inscripciones1`
    FOREIGN KEY (`inscripcion_id`)
    REFERENCES `alba2`.`inscripcion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_establecimientos_procedencia_paises1`
    FOREIGN KEY (`pais_id`)
    REFERENCES `alba2`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_establecimientos_procedencia_provincias1`
    FOREIGN KEY (`provincia_id`)
    REFERENCES `alba2`.`provincia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_establecimientos_procedencia_ciudades1`
    FOREIGN KEY (`ciudad_id`)
    REFERENCES `alba2`.`ciudad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_establecimientos_procedencia_tipos_gestion1`
    FOREIGN KEY (`tipo_gestion_id`)
    REFERENCES `alba2`.`tipo_gestion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_establecimientos_procedencia_niveles1`
    FOREIGN KEY (`nivel_id`)
    REFERENCES `alba2`.`nivel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_establecimientos_procedencia_establecimientos1`
    FOREIGN KEY (`establecimiento_id`)
    REFERENCES `alba2`.`establecimiento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`actualizacion_salud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`actualizacion_salud` ;

CREATE TABLE IF NOT EXISTS `alba2`.`actualizacion_salud` (
  `id` INT NOT NULL,
  `ficha_salud_id` INT NOT NULL,
  `observaciones` VARCHAR(255) NOT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_actualizaciones_salud_fichas_salud1_idx` (`ficha_salud_id` ASC),
  CONSTRAINT `fk_actualizaciones_salud_fichas_salud1`
    FOREIGN KEY (`ficha_salud_id`)
    REFERENCES `alba2`.`ficha_salud` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`area_asignatura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`area_asignatura` ;

CREATE TABLE IF NOT EXISTS `alba2`.`area_asignatura` (
  `id` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `nivel_id` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_asignatura_area_nivel1_idx` (`nivel_id` ASC),
  CONSTRAINT `fk_asignatura_area_nivel1`
    FOREIGN KEY (`nivel_id`)
    REFERENCES `alba2`.`nivel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `alba2`.`asignaturas_areas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alba2`.`asignaturas_areas` ;

CREATE TABLE IF NOT EXISTS `alba2`.`asignaturas_areas` (
  `id` INT NOT NULL,
  `area_asignatura_id` INT NOT NULL,
  `asignatura_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_area_asignatura_has_asignatura_asignatura1_idx` (`asignatura_id` ASC),
  INDEX `fk_area_asignatura_has_asignatura_area_asignatura1_idx` (`area_asignatura_id` ASC),
  CONSTRAINT `fk_area_asignatura_has_asignatura_area_asignatura1`
    FOREIGN KEY (`area_asignatura_id`)
    REFERENCES `alba2`.`area_asignatura` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_area_asignatura_has_asignatura_asignatura1`
    FOREIGN KEY (`asignatura_id`)
    REFERENCES `alba2`.`asignatura` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
