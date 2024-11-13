create database Сountries;

create Table countries(
Id INT primary key auto_increment,
Country VARCHAR(64)
);

create table Cities(
Id INT primary key auto_increment,
City varchar(64), 
Countryid int not null,
FOREIGN KEY(Countryid) references countries (Id)
);


INSERT INTO countries (Country)  VALUES ('Украина');
INSERT INTO countries (Country)  VALUES ('Новая Зеландия');

INSERT INTO Cities (City,Countryid)  VALUES ('Одесса',1);
INSERT INTO Cities (City,Countryid)  VALUES ('Харьков',1);
INSERT INTO Cities (City,Countryid)  VALUES ('Чернигов',1);

INSERT INTO Cities (City,Countryid)  VALUES ('Веллингтон',2);
INSERT INTO Cities (City,Countryid)  VALUES ('Гамильтон',2);
INSERT INTO Cities (City,Countryid)  VALUES ('Гисборн',2);



