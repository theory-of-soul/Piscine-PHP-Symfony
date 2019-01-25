After the introduction of SQL with Symfony, it is time to switch to Object Relational Mapping (ORM). In this exercise you will need to create the same table described in Exercise 00 

The expectations of this exercise are simple:

- Create a bundle for this exercise, named ex01;
- Create the entity corresponding to the requested structure; 
- Create the route that will call the generation of the table; 
- No SQL is allowed in this exercise;
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

The call to create the table should not fail if the table exists already.

Tip: Entity generation and table creation can be achieved using commands from the ORM doctrine. The commands can be found using the php appconsole doctrine command in the terminal. Also, terminal commands can be called in Symfony controllers.