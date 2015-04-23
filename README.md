
#Hair Salon SQL Assessment

##Bojana Skarich

###March 20th, 2015

###Description

This app will allow a hair salon owner to create a list of stylists and add clients who see each stylist. Each client sees only one stylist, and each stylist works independently. This is a one to many database relationship, with one stylist seeing many clients. Although I didn't finish this app completely, I did get a chance to create the one to many relationship between the stylists and clients tables in my database. 

###Technology

PHP
Silex
PHPUnit
PostgreSQL
Twig
Composer


###Database Commands Log

bojana=# CREATE DATABASE hair_salon;
CREATE DATABASE
bojana=# \c hair_salon;
You are now connected to database "hair_salon" as user "bojana".
hair_salon=# 

hair_salon=# CREATE TABLE stylists (id serial PRIMARY KEY, name varchar);
CREATE TABLE
hair_salon=# 

hair_salon=# CREATE TABLE clients (id serial PRIMARY KEY,name varchar, stylist_id int);
CREATE TABLE
hair_salon=# 

hair_salon=# CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon;
CREATE DATABASE
hair_salon=# \c hair_salon_test;
You are now connected to database "hair_salon_test" as user "bojana".
hair_salon_test=#

###License

The MIT License (MIT)

Copyright (c) 2015 Bojana Skarich

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
