<?php
/**
 * Class Matrix
 * @author DevLoris
 * @version 1.0
 */
class Matrix {
    var $mat;
    var $col;
    var $row;

    /**
     * Matrix constructor.
     * @param $row
     * @param $col
     */
    function __construct($row, $col)
    {
        $a = array();
        for($i = 1; $i <= $row; $i++) {
            for($i2 = 1; $i2 <= $col; $i2++) {
                $a[$i][$i2] = 0;
            }
        }
        $this->mat = $a;
        $this->row = $row;
        $this->col = $col;
    }

    /**
     * Set value of a row column matrix
     * @param $row
     * @param $col
     * @param $value
     */
    function setValue($row, $col, $value) {
        if(isset($this->mat[$row][$col]))
            $this->mat[$row][$col] = $value;
        else
            trigger_error("row ".$row." and ".$col." doesn't exist !");
    }

    /**
     * Get value of a row column matrix
     * @param $row
     * @param $col
     * @return bool
     */
    function getValue($row, $col) {
        if(isset($this->mat[$row][$col]))
            return $this->mat[$row][$col];
        else
            return trigger_error("row ".$row." and ".$col." doesn't exist, so no value !");
    }

    /**
     * Multiply 2 matrix together (requierement : same number of row - column)
     * @param Matrix $matrix
     * @return bool|Matrix
     */
    function multiply(Matrix $matrix) {
        if($matrix->col == $this->row) {
            $matrice2 = $this->mat;
            $matrice1 = $matrix->mat;
        }
        else if($matrix->row == $this->col) {
            $matrice1 = $this->mat;
            $matrice2 = $matrix->mat;
        }
        else {
            return trigger_error("couldn't multiple matrix");
        }

        $result = new Matrix(count($matrice1), count($matrice2[1]));

        for($ri=1;$ri<=count($matrice1);$ri++) {

            for($ci=1;$ci<=count($matrice2[1]);$ci++) {
                $d = 0;
                for($j=1;$j<=count($matrice2);$j++) {
                    $d += $matrice1[$ri][$j] * $matrice2[$j][$ci];
                }
                $result->setValue($ri, $ci, $d);
            }
        }
        return $result;
    }

    /**
     * Substract Matrix to another
     * @param Matrix $matrix
     * @return bool|Matrix
     */
    function subtraction(Matrix $matrix) {
        if($matrix->col == $this->col && $this->row == $matrix->row) {
            $result = new Matrix($this->col, $this->row);
            for($i = 1; $i <= $this->row; $i++)
                for ($i2 = 1; $i2 <= $this->col; $i2++)
                    $result->setValue($i, $i2, $matrix->mat[$i][$i2] + $this->mat[$i][$i2]);

            return $result;
        }
        else
            return trigger_error("not same size matrix, couldn't substracte values");
    }

    /**
     * Sum Matrix to another
     * @param Matrix $matrix
     * @return bool|Matrix
     */
    function sum(Matrix $matrix) {
        if($matrix->col == $this->col && $this->row == $matrix->row) {
            $result = new Matrix($this->col, $this->row);
            for($i = 1; $i <= $this->row; $i++)
                for ($i2 = 1; $i2 <= $this->col; $i2++)
                    $result->setValue($i, $i2, $matrix->mat[$i][$i2] + $this->mat[$i][$i2]);

            return $result;
        }
        else
            return trigger_error("not same size matrix, couldn't sum values");
    }

    /**
     * Multiply a Matrix with an exposant
     * @param $exp
     * @return bool|Matrix
     */
    function pow($exp) {
        $a = $this;

        for ($i = 1; $i < $exp; $i++) {
            $a = $this->multiply($a);
        }

        return $a;
    }

    /**
     * Convert row to column... for a Matrix
     * @return Matrix
     */
    function transpose() {
        $result = new Matrix($this->col, $this->row);
        for ($i = 1; $i <= $this->col; $i++) {
            for ($i2 = 1; $i2 <= $this->row; $i2++) {
                $result->setValue($i, $i2, $this->mat[$i2][$i]);
            }
        }
        return $result;
    }

}