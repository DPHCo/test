-- 1. Crear una base de datos y una tabla
-- Crear la base de datos
CREATE DATABASE company;

-- Usar la base de datos recién creada
USE company;

-- Crear la tabla employees
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    position VARCHAR(50),
    salary DECIMAL(10, 2),
    hire_date DATE
);

-- 2. Diferencia entre Primary Key y Foreign Key
-- Primary Key:
-- Una clave primaria es una columna (o un conjunto de columnas) que identifica de manera única cada fila en una tabla.
-- Cada tabla puede tener solo una clave primaria, y los valores en esta columna deben ser únicos y no nulos.

-- Foreign Key:
-- Una clave foránea es una columna (o un conjunto de columnas) en una tabla que establece un vínculo entre los datos de esa tabla y los datos de otra tabla.
-- La clave foránea en una tabla apunta a una clave primaria en otra tabla.

-- 3. Insertar registros en la tabla employees
INSERT INTO employees (name, position, salary, hire_date) VALUES
('John Doe', 'Software Engineer', 55000.00, '2023-01-15'),
('Jane Smith', 'Project Manager', 75000.00, '2022-07-22'),
('Emily Johnson', 'Data Analyst', 50000.00, '2021-03-10');

-- 4. Actualizar el salario de un empleado
UPDATE employees
SET salary = 60000.00
WHERE id = 1;

-- 5. Seleccionar empleados con salario mayor a 50000.00
SELECT *
FROM employees
WHERE salary > 50000.00
ORDER BY hire_date DESC;

-- 6. Transacciones en MySQL
START TRANSACTION;

-- Primera operación
UPDATE employees
SET salary = 60000.00
WHERE id = 1;

-- Segunda operación
UPDATE employees
SET salary = 65000.00
WHERE id = 2;

-- Si todo está bien, confirmar la transacción
COMMIT;

-- Si algo falla, deshacer la transacción
-- ROLLBACK;

-- 7. Crear una vista llamada high_earning_employees
CREATE VIEW high_earning_employees AS
SELECT *
FROM employees
WHERE salary > 70000.00;
