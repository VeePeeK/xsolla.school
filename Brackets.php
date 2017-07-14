<?php

class Brackets
{
    public function isBracketSequenceCorrect($str) {
       // stack for brackets
        $stack = array();
        $result = true;

        for ($i=0;$i<strlen($str)&&$result;$i++)
        {
            $cur = $str[$i];
            //brackets only
            if ($cur=='('||$cur=='['||$cur=='{'||$cur==')'||$cur==']'||$cur=='}')
            {
                $size = count($stack);
                //if stack is empty for closing brackets - false result
                //for closing brackets using pop from stack and check if it is matching
                switch ($cur)
                {
                    case ')':

                        if ($size>0)
                        {
                            $prev = array_pop($stack);
                            if ($prev!='(')
                            {
                                $result=false;
                            }
                        }
                        else
                        {
                            $result=false;
                        }
                        break;
                    case '}':
                        if ($size>0)
                        {
                            $prev = array_pop($stack);
                            if ($prev!='{')
                            {
                                $result=false;
                            }
                        }
                        else
                        {
                            $result=false;
                        }
                        break;
                    case ']':
                        if ($size>0)
                        {
                            $prev = array_pop($stack);
                            if ($prev!='[')
                            {
                                $result=false;
                            }
                        }
                        else
                        {
                            $result=false;
                        }
                        break;
                    //no checks for opening brackets
                    default:
                        //adding to stack
                        array_push($stack,$cur);
                        break;

                }
            }
            else
            {
                //if not a bracket - return false
                $result=false;
            }
        }

        return $result;
    }
}