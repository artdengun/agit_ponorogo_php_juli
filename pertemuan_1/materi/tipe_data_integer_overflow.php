<?php
// Integer Overflow di sistem operasi 32 bit
$maxInt32 = 2147483647;
$overflowInt32 = $maxInt32 + 1;
echo "Max Int 32-bit: $maxInt32\n"; // Output: Max Int 32-b
echo "Overflow Int 32-bit: $overflowInt32\n"; // Output: Overflo
// Integer Overflow di sistem operasi 64 bit
$maxInt64 = 9223372036854775807;
$overflowInt64 = $maxInt64 + 1;
echo "Max Int 64-bit: $maxInt64\n"; // Output: Max Int 64-
echo "Overflow Int 64-bit: $overflowInt64\n"; // Output: Overflo
?>