php-pretty-print
================

PHP any-variables pretty print (recursive)

Supports:

1. embedded arrays (recursive printing)
2. aligning keys,
3. string keys are quoted,
4. different color for different variables types,
5. if array contains only numeric keys, then it will be wrapped into square ([, ]) brackets, if associative - then curly ({, }) brackets
6. clever comma printing
	
How to use
================
```php
<?php
	include "PP.php";
	echo PP::do_($yourVariable);
?>
```

Screenshot from demo.php
================
http://take.ms/U7pMKj
