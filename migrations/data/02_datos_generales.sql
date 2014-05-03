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
-- Volcado de datos para la tabla `estados_alumno`
--
INSERT INTO estado_alumno (descripcion, nombre_interno) VALUES 
('Preinscripto', 'preinscripto'),
('Inscripto', 'inscripto'),
('Matriculado', 'matriculado'),
('Entrado', 'entrado'),
('Entrado con pase', 'entrado_pase'),
('Salido', 'salido'),
('Salido con pase', 'salido_pase'),
('Promovido', 'promovido'),
('No promovido', 'no_promovido'),
('Libre por inasistencias', 'libre_inasistencias'),
('Egresado', 'egresado');
