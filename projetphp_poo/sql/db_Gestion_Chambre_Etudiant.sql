/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  21/01/2023 18:14:47                      */
/*==============================================================*/


drop table if exists ADMINISTRATEUR;

drop table if exists BATIMENT;

drop table if exists CHAMBRE;

drop table if exists ETUDIANT;

/*==============================================================*/
/* Table : ADMINISTRATEUR                                       */
/*==============================================================*/
create table ADMINISTRATEUR
(
   ID_ADMI              int not null,
   NOM                  char(20),
   PRENOM               char(20),
   ADRESSE              char(20),
   TELEPHONE            int,
   primary key (ID_ADMI)
);

/*==============================================================*/
/* Table : BATIMENT                                             */
/*==============================================================*/
create table BATIMENT
(
   ID_BAT               int not null,
   NOM                  char(20),
   LOCALITE             char(40),
   primary key (ID_BAT)
);

/*==============================================================*/
/* Table : CHAMBRE                                              */
/*==============================================================*/
create table CHAMBRE
(
   ID_CHAMBRE           int not null,
   ID_BAT               int not null,
   NOM                  char(20),
   DESCRIPTION          char(30),
   primary key (ID_CHAMBRE)
);

/*==============================================================*/
/* Table : ETUDIANT                                             */
/*==============================================================*/
create table ETUDIANT
(
   ID_ETUDIANT          int not null,
   ID_CHAMBRE           int not null,
   NOM                  char(20),
   PRENOM               char(20),
   ADRESSE              char(20),
   E_MAIL               char(20),
   primary key (ID_ETUDIANT)
);

alter table CHAMBRE add constraint FK_CONTENIR foreign key (ID_BAT)
      references BATIMENT (ID_BAT) on delete restrict on update restrict;

alter table ETUDIANT add constraint FK_HABITER foreign key (ID_CHAMBRE)
      references CHAMBRE (ID_CHAMBRE) on delete restrict on update restrict;

