<?php

class MaximumUniqueSubstring
{
    public function findMaximumUniqueSubstring($str) {
        $array = array();
        $result = "";
        for ($i=0;$i<strlen($str);$i++) {
            $cur = $str[$i];
            $key = array_search($cur,$array);
            //adding to array if it is not there
            if ($key===False)
            {
                array_push($array,$cur);
            }
            //if symbol exists in array
            else
            {
                //if new substring is bigger than previous
                if (strlen($result)<count($array))
                {
                    $result=implode($array);
                }
                //remove everything before current symbol in array, including current symbol in array
                $array = array_slice($array,$key+1);
                //add symbol to the end of array
                array_push($array,$cur);
            }
        }
        //final check
        if (strlen($result)<count($array))
        {
            $result=implode($array);
        }
        return $result;
    }

}