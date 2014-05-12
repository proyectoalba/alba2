-- Establecimiento
INSERT INTO establecimiento (nombre, codigo, numero, telefono, telefono_alternativo, fax, email, sitio_web, dependencia_organizativa_id) VALUES
('Establecimiento 1', 'est-1', '1', '1234-5678', '9876-54321', NULL, 'establecimiento1@example.com', 'htttp://establecimiento1.example.com', NULL);

-- Sedes
INSERT INTO sede (establecimiento_id, codigo, nombre, telefono, telefono_alternativo, fax, principal) VALUES 
((SELECT id FROM establecimiento WHERE codigo = 'est-1'), 'sede-1 est-1', 'Sede 1 del Establecimiento 1', '1234-56789', '9876-543210', NULL, '1'), 
((SELECT id FROM establecimiento WHERE codigo = 'est-1'), 'sede-2 est-1', 'Sede 2 del Establecimiento 1', '1234-56798', '9876-543210', NULL, '0');

-- Domicilios
INSERT INTO domicilio (direccion, cp, pais_id, provincia_id, ciudad_id, principal, observaciones) VALUES
('Ascasubi 54', '1234', 10, 1, 132, 1, ''),
('Coronel Roca 345', '1234', 10, 2, 2010, 1, '');

-- Domicilio de Sede
INSERT INTO sede_domicilio (sede_id, domicilio_id) VALUES
((SELECT id FROM sede WHERE codigo = 'sede-1 est-1'), (SELECT id FROM domicilio WHERE direccion = 'Ascasubi 54' AND cp = '1234'));

-- Perfiles
INSERT INTO perfil (apellido, nombre, tipo_documento_id, numero_documento, estado_documento_id, sexo_id, fecha_nacimiento, lugar_nacimiento, telefono, telefono_alternativo, email, fecha_alta, foto, observaciones) VALUES
('Pérez', 'Juan', 1, '12345678', 1, 1, '2005-05-12', 'Buenos Aires', '1234-5678', '', '', '2014-05-11 18:13:15', '', ''),
('Cirio', 'Jesica', 1, '12345679', 2, 2, '1990-05-01', 'Buenos Aires', '1234-5679', '', 'jcirio@example.com', '2014-05-11 18:14:13', '', '');

-- Alumnos 
INSERT INTO alumno (perfil_id, cuenta_id, estado_id, observaciones) VALUES
((SELECT id FROM perfil WHERE tipo_documento_id = 1 AND numero_documento = '12345678'), NULL, 1, NULL),
((SELECT id FROM perfil WHERE tipo_documento_id = 1 AND numero_documento = '12345679'), NULL, 1, NULL);

-- Estados de alumnos
INSERT INTO alumno_estado (alumno_id, estado_id, fecha) VALUES
((SELECT al.id FROM perfil INNER JOIN alumno al ON al.perfil_id = perfil.id WHERE tipo_documento_id = 1 AND numero_documento = '12345678'), 1, '2014-05-11 18:13:15'),
((SELECT al.id FROM perfil INNER JOIN alumno al ON al.perfil_id = perfil.id WHERE tipo_documento_id = 1 AND numero_documento = '12345679'), 1, '2014-05-11 18:14:13');

-- Domicilio de Alumno
INSERT INTO perfil_domicilio (perfil_id, domicilio_id) VALUES
((SELECT id FROM perfil WHERE tipo_documento_id = 1 AND numero_documento = '12345678'), (SELECT id FROM domicilio WHERE direccion = 'Coronel Roca 345' AND cp = '1234'));
