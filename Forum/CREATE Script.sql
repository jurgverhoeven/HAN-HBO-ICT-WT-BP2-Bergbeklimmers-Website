use master
go

drop database Forums
go

create database Forums
go

use Forums
go

create table rubrieken(
	rubriek			varchar(50) not null,
	beschrijving	varchar(255) null

	CONSTRAINT PK_RUBRIEKEN PRIMARY KEY (rubriek)
)
go

create table posts(
	id				int	IDENTITY(1,1) not null,
	rubriek			varchar(50) not null,
	gebruiker		varchar(15) not null,
	kop				varchar(100) not null,
	tekst			text not null,
	unixtijd		int	null

	CONSTRAINT PK_POSTS PRIMARY KEY (id),
	CONSTRAINT FK_POSTS_RUBRIEK FOREIGN KEY (rubriek)
		REFERENCES rubrieken (rubriek)
)