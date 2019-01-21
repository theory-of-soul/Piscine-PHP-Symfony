```
Create a HotBeverage class with the attributes 'name', 
'price' and 'resistence' and create 'getter' (methods 
to return values) for all attributes.
Create two classes that extend the class HotBeverage, 
Coffee and Tea, both assigning a value to the attributes 
'name', 'price' and 'resistence' and having in addition 
the private attributes 'description' and 'how' which all
 two should have a value and a getter.
Modify the createFile (HotBeverage $ text) method of the 
TemplateEngine class so that it takes a HotBeverage object
 as parameter and, using the template template.html file,
  create a static HTML file with the name of the class of 
  the template. HotBeverage object by replacing the 
  parameters in the template with the value of the attributes
   of the object. The ReflectionClass PHP class should be 
   used to retrieve the attributes of the class and then
    retrieve their values ​​using respective getter calls.
The index.php file should create a Coffee object and a Tea 
object and call the createFile function for both objects
```