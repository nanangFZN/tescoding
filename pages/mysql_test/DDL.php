CREATE TABLE table_karyawan(
	id INT NOT NULL  AUTO_INCREMENT,
	first_name VARCHAR(155),
	last_name VARCHAR(155),
	birth_place VARCHAR(50),
	birth_date DATE,
	hire_date DATE,
	termination_date DATE,
	sallary INT(10),
	PRIMARY KEY (id)
);
