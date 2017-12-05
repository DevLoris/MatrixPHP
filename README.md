# MatrixPHP
A class who allow you to create and use matrix easily in PHP

## Basic Usages 

### Declare new Matrix
```
$Matrix = new Matrix($row, $colown);
```
It will create a Matrix with only 0 everywhere


### Set value to a field of the Matrix
```
$Matrix->setValue($row, $column, $value);
```
To put value on the Matrix, and replace an older one


### Get value of a field of the Matrix
```
$Matrix->getValue($row, $column);
```
It will return the value of the Matrix

## Advanced Usages

### Multiply
```
$Matrix2 = new Matrix($row, $column);
$Matrix->multiply($Matrix2);
```
Like in life, you need to use the same number of column-line between two matrix. For example, if the one has 2 columns, the two will have 2 lines...

### Addition & Substraction
```
$Matrix2= new Matrix($row, $column);
$Matrix->sum($Matrix2);
$Matrix->substract($Matrix2);
```
Both matrix need to have the same number of columns and the same number of lines.

### Pow / Exposant
```
$Matrix->pow(int $exposant);
```
It will multiply the matrix by himself while $exposant >= 1.
