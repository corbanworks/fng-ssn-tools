<?php

require('fngssn.class.php');

// Instantiate the class
$fngssn = new fngssn();

// Generate a SSN for California
echo $fngssn->generateSSN('CA');

echo '<br /><br />';

// Validate a SSN
echo $fngssn->validateSSN('421-61-1998');

?>