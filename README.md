
Hair Salon SQL Assessment

Bojana Skarich

March 20th, 2015

Description

This app will allow a hair salon owner to create a list of stylists and add clients who see each stylist. Each client sees only one stylist, and each stylist works independently. This is a one to many database relationship, with one stylist seeing many clients. 

Technology

PHP
Silex
PHPUnit
PostgreSQL
Twig
Composer


Database Commands Log

//Create hair_salon database

bojana=# CREATE DATABASE hair_salon;
CREATE DATABASE
bojana=# \c hair_salon;
You are now connected to database "hair_salon" as user "bojana".

//Create hair_salon_test
hair_salon=# CREATE DATABASE hair_salon_testWITH TEMPLATE hair_salon;
CREATE DATABASE
hair_salon=# 
hair_salon=# \c hair_salon_test;
FATAL:  database "hair_salon_test" does not exist
Previous connection kept

//Create stylists table
hair_salon=# CREATE TABLE stylists (id serial PRIMARY KEY, name varchar);
CREATE TABLE
hair_salon=# 


//Connect to hair_salon_test db
bojana=# \connect hair_salon_test;
You are now connected to database "hair_salon_test" as user "bojana".
hair_salon_test=# \dt
No relations found.
hair_salon_test=# \l

//Create stylists table
hair_salon_test=# CREATE TABLE stylists (id serial primary key, name varchar);
CREATE TABLE

//Drop clients table from hair_salon_test database
hair_salon_test=# DROP TABLE clients;
DROP TABLE
hair_salon_test=#

//Connect to hair_salon_db
hair_salon_test=# \connect hair_salon
You are now connected to database "hair_salon" as user "bojana".
hair_salon=# 

//Create clients table in hair_salon db
hair_salon=# CREATE TABLE clients (id serial PRIMARY KEY, name);

//Create clients table in hair_salon_test db
hair_salon_test=# CREATE TABLE clients (id serial PRIMARY KEY, name varchar);




License

The MIT License (MIT)

Copyright (c) 2015 Bojana Skarich

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
