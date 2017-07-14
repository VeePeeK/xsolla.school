<?php

class MaximumUniqueSubstring
{
    public function findMaximumUniqueSubstring($str) {
        $array = array();
        for ($i=0;$i<strlen($str);$i++) {
            $cur = $str[$i];
            //adding to array if it is not there
            if (!in_array($cur,$array))
            {
                array_push($array,$cur);
            }
        }
        //convert array back to string
        $result = implode($array);
        return $result;
    }

}