php-pretty-print
================

PHP any-variables pretty print (recursive), good for debugging.

Supports:

1. embedded arrays (recursive printing)
2. aligning keys,
3. string keys are quoted,
4. different color for different variables types,
5. if array contains only numeric keys, then it will be wrapped into square ([, ]) brackets, if associative - then curly ({, }) brackets,
6. clever comma printing,
7. collapsing long strings (pure js, you don't need jquery for this :)),
8. collapsing keys (if many),
9. easy to configure for your needs through class attributes.

Examples
================
```php
<?php
	include "PP.php";
	PP::dump(123, "string", $arr); // echoes
?>
```

Screenshot of result:
http://take.ms/2oDAPI

Example of printing complicated object (collapse feature):

```php
<?php
	include "PP.php";
	echo PP::one($arr, "Demo #1"); // returns
?>
```
Screenshot of result:
http://take.ms/z5chDv

Hints
================
Although, class & methods names are rather intuitive, you may want to do a wrapper for them and/or setup "live templates" in your IDE for handy (by hotkeys) inserting that in your code.
