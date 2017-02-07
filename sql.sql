#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id           int (11) Auto_increment  NOT NULL ,
        nom          Varchar (25) ,
        prenom       Varchar (25) ,
        mdp          Varchar (25) ,
        actif        Bool ,
        id_formation Int ,
        id_titre     Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: matiere
#------------------------------------------------------------

CREATE TABLE matiere(
        id      int (11) Auto_increment  NOT NULL ,
        matiere Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: salles
#------------------------------------------------------------

CREATE TABLE salles(
        id         int (11) Auto_increment  NOT NULL ,
        nom        Varchar (25) ,
        nb_pc      Int ,
        tableau    Bool ,
        projecteur Bool ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation
#------------------------------------------------------------

CREATE TABLE reservation(
        id             int (11) Auto_increment  NOT NULL ,
        date_debut     Date ,
        date_fin       Date ,
        id_salles      Int ,
        id_formation   Int ,
        id_matiere     Int ,
        id_utilisateur Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: formation
#------------------------------------------------------------

CREATE TABLE formation(
        id        int (11) Auto_increment  NOT NULL ,
        formation Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: titre
#------------------------------------------------------------

CREATE TABLE titre(
        id    int (11) Auto_increment  NOT NULL ,
        titre Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: forme
#------------------------------------------------------------

CREATE TABLE forme(
        id             Int NOT NULL ,
        id_utilisateur Int NOT NULL ,
        PRIMARY KEY (id ,id_utilisateur )
)ENGINE=InnoDB;

ALTER TABLE utilisateur ADD CONSTRAINT FK_utilisateur_id_formation FOREIGN KEY (id_formation) REFERENCES formation(id);
ALTER TABLE utilisateur ADD CONSTRAINT FK_utilisateur_id_titre FOREIGN KEY (id_titre) REFERENCES titre(id);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_salles FOREIGN KEY (id_salles) REFERENCES salles(id);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_formation FOREIGN KEY (id_formation) REFERENCES formation(id);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_matiere FOREIGN KEY (id_matiere) REFERENCES matiere(id);
ALTER TABLE reservation ADD CONSTRAINT FK_reservation_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id);
ALTER TABLE forme ADD CONSTRAINT FK_forme_id FOREIGN KEY (id) REFERENCES matiere(id);
ALTER TABLE forme ADD CONSTRAINT FK_forme_id_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id);
