use beerfund;

create table meetings( mtg_id INT not null auto_increment primary key, 
			mtg VARCHAR(50) not null );

create table dues( enteree VARCHAR(100) not null,
			latecomer VARCHAR(100) not null,
			mtg_id INT not null,
			late_by INT not null);

create table user_info( id INT not null auto_increment primary key,
       	     		user  VARCHAR(100) not null,
			psswd VARCHAR(100) not null);
