                                        -->Create table airports
create table airports (	
	id serial,
	airport_code varchar(3) unique not null,
	airport_name varchar not null,
	airport_city varchar not null,
	airport_timezone varchar not null,
	primary key(airport_code, airport_name, airport_city, airport_timezone)
	);


	
                                        -->Create table aircrafts
create table aircrafts (	
	id serial,
	aircraft_code varchar(3) unique not null,
	aircraft_model varchar not null,
	capacity integer not null,
	range numeric not null,
	primary key(aircraft_code)
	);

                                        -->Create table flights
CREATE TYPE tf_status AS ENUM ('Scheduled', 'OnTime', 'Delayed', 'Departed', 'Arrived','Cancelled');

create table flights (	
	id serial,
	flight_no bigint unique not null,
	departure_date bigint not null,
	arrival_date bigint not null,
	departure_airport varchar not null,
	arrival_airport varchar not null,
	aircraft_code varchar references aircrafts(aircraft_code) not null, --for the model
	distance decimal not null,
	scheduled_departed_time bigint not null,
	scheduled_arrival_time bigint not null,
	scheduled_duration bigint  not null,
	actual_departure_time bigint default null,
	actual_arrival_time bigint default null,
	actual_duration bigint default null,
	flight_status TF_STATUS  default 'Scheduled' not null,
	primary key(flight_no),
	constraint fk_dep_airport
		foreign key(departure_airport)
			references  airports(airport_code),
	constraint fk_ar_airport
		foreign key(arrival_airport)
			references  airports(airport_code)

	);


                                        -->Create table passengers
 create table passengers(
 	id serial,
 	passenger_id varchar unique not null,
 	passenger_name varchar unique not null,
 	passenger_phone varchar not null,
 	passenger_mail varchar not null,
 	passenger_address varchar not null,
 	passenger_created_on varchar not null,
 	primary key(passenger_id)
	);
                                        -->Create table tickets
CREATE TYPE TT_FARE AS ENUM ('Economy', 'Business', 'First Class');

create table tickets(
	id serial,
	ticket_no numeric(13) unique not null,
	passenger_id varchar not null,
	flights varchar not null,
	tickets_price varchar not null,
	fare varchar not null,
	primary key(ticket_no)
	);



                                        -->Create table book
create table book(
	id serial,
	book_ref varchar unique not null,
	book_date bigint not null,
	tickets varchar not null, --retrieve from passenger-flights
	passengers_names varchar not null, --retrieve from passenger-flights	
	amount float not null, 
	primary key(book_ref)
);


                                        -->Create table passenger_flight
create table passenger_flight(
	id serial,
	passenger_id varchar not null,
	flight_no bigint not null,
	ticket_no bigint not null,
	book_date bigint not null,
	book_ref varchar not null,
	ticket_fare TT_FARE not null,
	ticket_price decimal not null,
	arrival_port varchar(3) not null,
	departure_port varchar(3) not null,
	primary key(passenger_id, flight_no, ticket_no, book_ref,arrival_port,departure_port),
	constraint fk_flight_no
		foreign key(flight_no)
			references flights(flight_no),
	constraint fk_ticket_no
		foreign key(ticket_no)
			 references tickets(ticket_no),
	constraint fk_passenger_id
		foreign key(passenger_id)
			  references passengers(passenger_id),
	constraint fk_book_ref
		foreign key(book_ref)
			  references book(book_ref),
	constraint fk_departure_port
		foreign key(arrival_port)
			  references airports(airport_code),
	constraint fk_arrival_port
		foreign key(arrival_port)
			  references airports(airport_code)
	);




                                        -->Create table boarding_pass
create table boarding_pass (
	id serial,
	boarding_no numeric default null,
	seat_no numeric default null,
	ticket_no bigint not null,
	passenger_id varchar not null,
	primary key(boarding_no, ticket_no, passenger_id),
	constraint fk_ticket_no
		foreign key(ticket_no)
			references tickets(ticket_no),
	constraint fk_passenger_id
		foreign key(passenger_id)
			references passengers(passenger_id)		
	);

                                        -->Insert Values Into tables
insert into airports (airport_code, airport_name, airport_city, airport_timezone)
 values ('TSI', 'TSIMARI', 'Aitoliko', 'UTC');
insert into airports (airport_code, airport_name, airport_city, airport_timezone)
 values ('AWS', 'AMAZON', 'To the moon', 'UTC');
insert into airports (airport_code, airport_name, airport_city, airport_timezone)
 values ('BOS', 'CELTICS', 'Boston', 'UTF');

                                        -->Insert Values Into tables
insert into aircrafts (aircraft_code, aircraft_model, capacity, range)
 values ('1A7', 'Giannis Antentokoumpo', 52, 5000000000.43);
insert into aircrafts (aircraft_code, aircraft_model, capacity, range)
 values ('185', 'Daka', 52, 5000000000.43);
insert into aircrafts (aircraft_code, aircraft_model, capacity, range)
 values ('155', 'Somo', 52, 5000000000.43);
insert into aircrafts (aircraft_code, aircraft_model, capacity, range)
 values ('1B7', 'Somoeno', 52, 5000000000.43);

insert into passengers(passenger_id, passenger_name, passenger_phone, passenger_mail,passenger_address,
 					  passenger_created_on)
values ('am3715', 'Jim Brown', '+302104343333', 'jim@brown.com','Peiraeus State Resident 34 56',1655799125366);

insert into passengers(passenger_id, passenger_name, passenger_phone, passenger_mail,passenger_address,
 					  passenger_created_on)
values ('am-1121243', 'Xristos Katsimikakos', '+362102020200', 'krempek@gmail.com','Athens 36',1655799125342);

insert into passengers(passenger_id, passenger_name, passenger_phone, passenger_mail,passenger_address,
 					  passenger_created_on)
values ('ams23715', 'Jogn Geg', '+3621043823', 'jjjj@gmail.com','Philadelphia 56',1655799125367);

insert into flights(
	flight_no, departure_date, 
	arrival_date,departure_airport,
	arrival_airport, aircraft_code,
	distance,scheduled_departed_time,
	scheduled_arrival_time,scheduled_duration, 
	actual_departure_time, actual_arrival_time,
	actual_duration, flight_status
	) values (431267,1655799120066,1655799122366,'TSI','AWS','155',340000.89,1655799120066,1655799122366,66,1655799120266, 1655799122766, 64,'Scheduled');
insert into flights(
	flight_no, departure_date, 
	arrival_date,departure_airport,
	arrival_airport, aircraft_code,
	distance,scheduled_departed_time,
	scheduled_arrival_time,scheduled_duration, 
	actual_departure_time, actual_arrival_time,
	actual_duration, flight_status
	) values (431297,1655799127966,1655799132366,'AWS','BOS','185',340000.89,1655799120066,1655799122366,66,1655799120266, 1655799122766, 64,'Scheduled');

insert into tickets(ticket_no, passenger_id, flights, tickets_price, fare) 
values(1234567890125,'am3715','TSI-AWS, AWS-BOS','45, 35','Economy, Economy');

insert into book(book_ref, book_date, tickets, passengers_names,amount)
values (1235,1655799124372,1234567890125,'Jim Brown',80);


insert into passenger_flight(passenger_id, flight_no, ticket_no, book_date, book_ref, ticket_fare, ticket_price, departure_port, arrival_port)
values('am3715',431267,1234567890125,1655799124372,1235,'Economy',45,'TSI','AWS');
insert into passenger_flight(passenger_id, flight_no, ticket_no, book_date, book_ref, ticket_fare, ticket_price, departure_port, arrival_port)
values('am3715',431267,1234567890125,1655799124372,1235,'Economy',35,'AWS','BOS');

insert into boarding_pass(boarding_no,
seat_no,
ticket_no,
passenger_id,)
values('am3715',431267,1234567890125,1655799124372,1235,'Economy',35,'AWS','BOS');
insert into passenger_flight(passenger_id, flight_no, ticket_no, book_date, book_ref, ticket_fare, ticket_price, departure_port, arrival_port)
values('am3715',431267,1234567890125,1655799124372,1235,'Economy',35,'AWS','BOS');








                                        -->Create table customers

CREATE TABLE customers (
	customer_name VARCHAR ( 50 ) NOT NULL,
	customer_phone VARCHAR ( 25 ) NOT NULL,
	customer_id_card VARCHAR (25) PRIMARY KEY,
	customer_mail VARCHAR (40) NOT NULL,
	customer_address VARCHAR (50) NOT NULL,
	customer_created_on BIGINT
);
INSERT INTO customers(customer_name,customer_phone,customer_id_card,customer_mail,customer_address,customer_created_on) VALUES ('kostas','+302104343333','mppl21050','asd@asdfor.com','sky-high',1655799125366);

---------------------------------------------------------------------------------

-- select plane_name from  airplanes;
-- select plane_name from airplanes where random() < (SELECT count(*) FROM airplanes);
-- select plane_name from airplanes ORDER BY random() limit 1



-- CREATE TABLE tickets (
-- 	passenger_id_card VARCHAR (25),
-- 	passenger_name VARCHAR ( 50 ) NOT NULL,
-- 	passenger_phone VARCHAR ( 25 ) NOT NULL,
-- 	ticket_id BIGINT  PRIMARY KEY,
-- 	ticket_price VARCHAR ( 25 ) NOT NULL
-- );

-- select * from tickets;
select * from customers;
-- select customer_id_card from customers WHERE customer_name LIKE 'new';

-- CREATE TABLE customers (
-- 	customer_name VARCHAR ( 50 ) NOT NULL,
-- 	customer_phone VARCHAR ( 25 ) NOT NULL,
-- 	customer_id_card VARCHAR (25) PRIMARY KEY,
-- 	customer_mail VARCHAR (40) NOT NULL,
-- 	customer_address VARCHAR (50) NOT NULL,
-- 	customer_created_on BIGINT
-- );

<?php
    require_once '../env.php';
    //Open Connection
    $connecionstr='host='.DB_SERVER.' port=5432 dbname='.DB_BASE.' password='.DB_PASS.' user='.DB_USER.' options='--client_encoding=UTF8'';
    $dbconn = pg_connect($connecionstr);
    $milliseconds = floor(microtime(true) * 1000);

    // Check connection
    if (!$dbconn) {
        die('Connection failed: ' . pg_connect_error());
    }
    //Sql query
    $name=$_POST['lastName'];
    $sql = 'INSERT INTO customers(customer_name,customer_phone,customer_id_card,customer_mail,customer_address,customer_created_on) VALUES (''.$_POST['lastName'].'',''.$_POST['phone'].'',''.$_POST['idCard'].'',''.$_POST['mail'].'',''.$_POST['userAddress'].'',$milliseconds)';
    // echo $sql;
    $result = pg_query($dbconn, $sql) ;
    //Check results
    if ($result) {
                echo '<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                <p>$name αποθηκευση οκ
                </p> <br>
                <a href='../dashboard.php'>Back</a>
                </div>
';
    } else {
                    echo '<div style='height:100px;background-color: antiquewhite;width:100%;margin:auto;position: absolute;top:50%;text-align: center;'>
                    <p>Error: στην αποθηκευση
                    </p> <br>
                    <a href='../dashboard.php'>Back</a>
                    </div>
';
        die('Query failed: ' . pg_last_error());
    }
    // Close connection
    pg_close($dbconn);
?>




