This exercise will help you learn the basics of using SQL in Symfony frameworks. The expectations of this exercise are simple:

- Create a bundle for this exercise, named ex00;

[The bundle system](https://symfony.com/doc/current/bundles.html)
- Create the SQL query that will create a new table in the DB;
```sql
$ mysql -u USERNAME -p
mysql> CREATE DATABASE ex00;
mysql> SHOW databases;
```
- Configure the connection to the BD;

in `.env`:
```
# Configure your db driver and server_version in config/packages/doctrine.yaml
DATABASE_URL=mysql://root:password@127.0.0.1:3306/ex00
```
- Create the route that will call the generation of the table;

- No ORM is allowed in this exercise;
- The structure of the table should correspond to that described in the exercise.

The result of this exercise should be a page containing a button / link to create the table and a success / error message depending on the success of the creation or not.
of the table.
The structure of the table is as follows:

- id - integer - primary key 
- username - string - unique 
- name - string
- email - string - unique
- enable - boolean
- birthdate - datetime 
- address - long text

The call to create the table should not fail if the table exists
already.