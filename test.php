<?php
include "lib/Matrix.php";

/*
 *  Exemple of Matrix Setup
 */
$Maxtrix = new Matrix(2, 2);
$Maxtrix->setValue(1, 1 , 1);
$Maxtrix->setValue(2, 1 , 3);
$Maxtrix->setValue(1, 2 , 2);
$Maxtrix->setValue(2, 2 , 5);


/*
 *  Exemple for Matrix function
 *  (Matrix 2 is a second matrix for exemple)
 */

$Maxtrix2 = new Matrix(2, 2);
$Maxtrix2->setValue(1, 1, 1);
$Maxtrix2->setValue(2, 1, 4);
$Maxtrix2->setValue(1, 2, 1);
$Maxtrix2->setValue(2, 2, 3);

var_dump($Maxtrix->transpose());

var_dump($Maxtrix);

var_dump($Maxtrix->pow(2));

var_dump($Maxtrix->multiply($Maxtrix2));

var_dump($Maxtrix->sum($Maxtrix2));

var_dump($Maxtrix->subtract($Maxtrix2));
