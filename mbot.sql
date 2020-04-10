CREATE TABLE utilisateur(
   utilisateur_id INT AUTO_INCREMENT PRIMARY KEY,
   pseudo VARCHAR(255) NOT NULL,
   pseudo VARCHAR(255) NOT NULL
) ;

CREATE TABLE coordonnees(
   coordonnées_id INT AUTO_INCREMENT PRIMARY KEY,
   longitude VARCHAR(255) NOT NULL,
   latitude VARCHAR(255)NOT NULL
   FOREIGN KEY (temperature_id)
     REFERENCES tasks (temperature_id)
        
);


CREATE TABLE utilisateur(
   temperature_id INT AUTO_INCREMENT PRIMARY KEY,
   temperature DECIMAL,
) ;









