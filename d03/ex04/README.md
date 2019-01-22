Create a custom package that will be included in projects using the Composer. The package must implement a function that will return the current weather in your city. Weather conditions must be added to a `weather.txt` file and must be in degrees Celsius.

In order to create a package you must use a REST client that will call the API. You need to find an API that returns the current weather for your current rental. It is possible that for your API weather request to be accepted you must register with the API provider. 
Do not ignore this step.

The package must respect the following rules:

- the package name should have the format: `yourLogin/weather`
- he must have requested version `5.5.0` of PHP
- It must have been submitted to the `REST Client` package for PHP ([https://github.com/tcdent/php-restclient](https://github.com/tcdent/php-restclient))
- stability must be set to `dev`