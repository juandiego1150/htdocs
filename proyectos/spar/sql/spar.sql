-- Creación de la tabla Productos con campo nombreimagen
CREATE TABLE Productos (
    idProducto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    precio DECIMAL(10, 2),
    nombreimagen VARCHAR(255) -- Cambia el tamaño según tus necesidades
);

-- Creación de la tabla Usuario
CREATE TABLE Usuario (
    IdUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    contraseña VARCHAR(100),
    tipoUsuario BIT
);

-- Creación de la tabla Oferta
CREATE TABLE Oferta (
    idOferta INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT,
    fechaInicio DATE,
    fechaFin DATE
);

-- Creación de la tabla Producto_Oferta
CREATE TABLE Producto_Oferta (
    IdProducto INT,
    IdOferta INT,
    PRIMARY KEY (IdProducto, IdOferta),
    FOREIGN KEY (IdProducto) REFERENCES Productos(idProducto),
    FOREIGN KEY (IdOferta) REFERENCES Oferta(idOferta)
);
