--TEST--
Test sprintf() function : usage variations - char formats with char values
--FILE--
<?php
/* Prototype  : string sprintf(string $format [, mixed $arg1 [, mixed ...]])
 * Description: Return a formatted string
 * Source code: ext/standard/formatted_print.c
*/


echo "*** Testing sprintf() : char formats with char values ***\n";

// array of char values
$char_values = array( 'a', "a", 67, -67, 99, ' ', '', 'A', "A" );

// array of char formats
$char_formats = array(
  "%c", "%hc", "%lc",
  "%Lc", " %c", "%c ",
  "\t%c", "\n%c", "%4c",
  "%30c", "%[a-bA-B@#$&]", "%*c"
);

$count = 1;
foreach($char_values as $char_value) {
  echo "\n-- Iteration $count --\n";

  foreach($char_formats as $format) {
    var_dump( sprintf($format, $char_value) );
  }
  $count++;
};

echo "Done";
?>
--EXPECT--
*** Testing sprintf() : char formats with char values ***

-- Iteration 1 --
string(1) " "
string(1) "c"
string(1) " "
string(1) "c"
string(2) "  "
string(2) "  "
string(2) "	 "
string(2) "
 "
string(1) " "
string(1) " "
string(11) "a-bA-B@#$&]"
string(1) "c"

-- Iteration 2 --
string(1) " "
string(1) "c"
string(1) " "
string(1) "c"
string(2) "  "
string(2) "  "
string(2) "	 "
string(2) "
 "
string(1) " "
string(1) " "
string(11) "a-bA-B@#$&]"
string(1) "c"

-- Iteration 3 --
string(1) "C"
string(1) "c"
string(1) "C"
string(1) "c"
string(2) " C"
string(2) "C "
string(2) "	C"
string(2) "
C"
string(1) "C"
string(1) "C"
string(11) "a-bA-B@#$&]"
string(1) "c"

-- Iteration 4 --
string(1) "?"
string(1) "c"
string(1) "?"
string(1) "c"
string(2) " ?"
string(2) "? "
string(2) "	?"
string(2) "
?"
string(1) "?"
string(1) "?"
string(11) "a-bA-B@#$&]"
string(1) "c"

-- Iteration 5 --
string(1) "c"
string(1) "c"
string(1) "c"
string(1) "c"
string(2) " c"
string(2) "c "
string(2) "	c"
string(2) "
c"
string(1) "c"
string(1) "c"
string(11) "a-bA-B@#$&]"
string(1) "c"

-- Iteration 6 --
string(1) " "
string(1) "c"
string(1) " "
string(1) "c"
string(2) "  "
string(2) "  "
string(2) "	 "
string(2) "
 "
string(1) " "
string(1) " "
string(11) "a-bA-B@#$&]"
string(1) "c"

-- Iteration 7 --
string(1) " "
string(1) "c"
string(1) " "
string(1) "c"
string(2) "  "
string(2) "  "
string(2) "	 "
string(2) "
 "
string(1) " "
string(1) " "
string(11) "a-bA-B@#$&]"
string(1) "c"

-- Iteration 8 --
string(1) " "
string(1) "c"
string(1) " "
string(1) "c"
string(2) "  "
string(2) "  "
string(2) "	 "
string(2) "
 "
string(1) " "
string(1) " "
string(11) "a-bA-B@#$&]"
string(1) "c"

-- Iteration 9 --
string(1) " "
string(1) "c"
string(1) " "
string(1) "c"
string(2) "  "
string(2) "  "
string(2) "	 "
string(2) "
 "
string(1) " "
string(1) " "
string(11) "a-bA-B@#$&]"
string(1) "c"
Done
