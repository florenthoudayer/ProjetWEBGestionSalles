#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id_utilisateur int (11) Auto_increment  NOT NULL ,
        nom            Varchar (25) ,
        prenom         Varchar (25) ,
        autorisation   Varchar (25) ,
        id_formation   Int ,
        PRIMARY KEY (id_utilisateur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: matiere
#------------------------------------------------------------

CREATE TABLE matiere(
        id_matiere int (11) Auto_increment  NOT NULL ,
        intitule   Varchar (25) ,
        PRIMARY KEY (id_matiere )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: salles
#------------------------------------------------------------

CREATE TABLE salles(
        id_salle   int (11) Auto_increment  NOT NULL ,
        nom        Varchar (25) ,
        nb_pc      Int ,
        tableau    Bool ,
        projecteur Bool ,
        PRIMARY KEY (id_salle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation
#------------------------------------------------------------

CREATE TABLE reservation(
        id_reservation int (11) Auto_increment  NOT NULL ,
        date_debut     Date ,
        date_fin       Date ,
        id_salle       Int ,
        id_formation   Int ,
        id_matiere     Int ,
        id_utilisateur Int ,
        PRIMARY KEY (id_reservation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: formation
#------------------------------------------------------------

CREATE TABLE formation(
        id_formation int (11) Auto_increment  NOT NULL ,
        nom          Varchar (25) ,
        PRIMARY KEY (id_formation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: possede
#------------------------------------------------------------

CREATE TABLE possede(
        id_matiere     Int NOT NULL ,
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id_matiere ,id_utilisateur )
)ENGINE=InnoDB;

ALTER TABLE utilisateur ADD CONSTRAINT FK_utilisateur_id_formation FOREIGN KEY (id_formation) REFERENCES formation(id_formation);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_salle FOREIGN KEY (id_salle) REFERENCES salles(id_salle);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_formation FOREIGN KEY (id_formation) REFERENCES formation(id_formation);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_matiere FOREIGN KEY (id_matiere) REFERENCES matiere(id_matiere);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);
ALTER TABLE possede ADD CONSTRAINT FK_possede_id_matiere FOREIGN KEY (id_matiere) REFERENCES matiere(id_matiere);
ALTER TABLE possede ADD CONSTRAINT FK_possede_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur);

