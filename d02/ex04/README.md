Modify the Elem class from the previous exercise to throw the MyException exception if an unauthorized tag is provided as a parameter in the constructor.
Adding the plug does not load any of the following tags: table, tr, th, td, ul, ol, li.
Also, modify the constructor to take a new optional parameter, attributes, which will contain a table with the attributes to add in the HTML rendering of the tag.
Example:
 
```php
$elem = new Elem('html');
$body = new Elem('body');
$body->pushElement(new Elem('p', 'Lorem ipsum', ['class' => 'text-muted']));
$elem->pushElement($body);
echo $elem->getHTML();
$elem = new Elem('undefined');  // Raises a MyException $ Exception
```

Should generate the following HTML code:
```html
<html>
<body>
    <p class="text-muted">Lorem ipsum</p>
</body>
</html>
```
