--
-- Volcado de datos para la tabla `tipo_responsable`
--
INSERT INTO tipo_responsable (descripcion) VALUES 
('Padre'),
('Madre'),
('Hermano/a'),
('Tio/a'),
('Abuelo/a'),
('Primo/a'),
('Padrastro'),
('Madrastra'),
('Responsable a cargo'),
('Tutor/a');

--
-- Volcado de datos para la tabla `tipo_documento`
--
INSERT INTO tipo_documento (descripcion, abreviatura) VALUES 
('Documento Nacional de Identidad', 'DNI'),
('Libreta de Enrolamiento', 'LE'),
('Credencial Residencia Precaria', 'CRP'),
('Sin Documento', 'SD'),
('DNI Extranjero', 'DNX'),
('Pasaporte Extranjero', 'PE'),
('Cédula de Identidad', 'CI'),
('Cédula de Identidad Extranjero', 'CIE'),
('Libreta Cívica', 'LC'),
('En Trámite', 'TRA');

--
-- Volcado de datos para la tabla `tipo_documento`
--
INSERT INTO estado_documento (descripcion) VALUES 
('Bueno'),
('Malo'),
('No aplica');

--
-- Volcado de datos para la tabla `sexo`
--
INSERT INTO sexo (descripcion, abreviatura) VALUES 
('Masculino', 'M'),
('Femenino', 'F'),
('No aplica', 'N/A');

--
-- Volcado de datos para la tabla `estados_alumno`
--
INSERT INTO estado_alumno (descripcion) VALUES 
('Preinscripto'),
('Inscripto'),
('Matriculado'),
('Entrado'),
('Entrado con pase'),
('Salido'),
('Salido con pase'),
('Promovido'),
('No promovido'),
('Libre por inasistencias'),
('Egresado');
