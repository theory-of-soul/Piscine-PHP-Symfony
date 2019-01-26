For the continuation of the specific operations CRUD, we arrive at the deletion (Title). For this exercise, using only SQL and PHP, you will need to write a specific Symfony bundle that will handle this operation. The deletion will have to be carried out by using an endpoint of the application that accepts a request provided, such as / delete /? Id = or / delete / {id}, where id represents a unique identifier of the object to be deleted .

The list of operations required for this exercise is as follows:

- Create a bundle named ex04;  
- Create a separate table for this exercise;
- Create a controller method that uses a parameter to suppress data;
- Create the SQL code to [delete the data](https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#prepare) from the database using the condition;
- Check that an item exists in the DB;
- Create an HTML page in which we see the existing data in the table and add the buttons to delete each line;
- Use only SQL code to delete data in the DB, not authorized ORM;
- Add a success / error message on the web page to display the result of the delete operation.