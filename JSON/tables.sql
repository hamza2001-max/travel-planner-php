create table destination (
    dest_name varchar(100) PRIMARY KEY,
    dest_description varchar(500) NOT NULL,
    dest_cost int NOT NULL,
    dest_Image varchar(255) NOT NULL
);

create table landmark (
	land_id int AUTO_INCREMENT PRIMARY KEY,
    land_name varchar(100) NOT NULL,
    land_description varchar(500) NOT NULL,
    land_image varchar(255) NOT NULL,
    dest_name varchar(100) NOT NULL,
    FOREIGN KEY (dest_name) REFERENCES destination(dest_name) 
);