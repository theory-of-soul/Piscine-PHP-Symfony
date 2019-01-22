Add a new method to the Elem class, called validPage (), which will return either true or false depending on whether the HTML of a given element is a valid HTML page.
This method should cross all the elements and check that the following conditions are true:
- the parent element / tag is html and contains exactly one head element followed by a body element
- the head element should contain a single title element and a single element meta charset
- the p tag should not contain any other tags, only text
- the table tag should contain only tr tags, the latter containing only
th or td tags
- the elements ul and ol should contain only elements li
Add tests to validate if all the above conditions are met.