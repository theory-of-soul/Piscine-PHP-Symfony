Back to the ORM, the operations requested in the previous exercise can be performed using only commands specific to ORM Doctrine. To insert and read with ORM the list of required operations is as follows:

- Create a bundle for this exercise, named ex03;
- Create a new entity with its own table using the same structure provided
in previous exercises;
- <b>This exercise will be solved using only the ORM Doctrine</b>;
- Create a Symfony form and and map it to the previously created entity;
- Create specific endpoints in the controller for form display (show form), management of inserted data and display of table data;
- Ensure that single-valued fields will not generate exceptions during insertions;
- Create a web page containing an HTML table in which you will show the contents of the table;
- The form must contain a validation;
- ORM commands should not be managed in the controller.

<b>Neither the call to create the table nor the insert should fail if the table
already exists or if the data is already present in the table.</b>

The final version of the result of this exercise should allow a user to insert information in the DB by the form provided and display the list of all entities present in the DB.

Tip: For the list of Doctrine commands you can display them using the command `php bin/console list doctrine` in the terminal.