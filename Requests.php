<?php
//directory to store files
$base = "/files/";

//check if parameter exist
$file = (isset($_REQUEST["file"])?$_REQUEST["file"]:null);

if ($file!==null) {
    //primitive check of filename for security purposes
    $file = $base.basename($file);

    switch ($_SERVER['REQUEST_METHOD']) {
        //file size request
        case 'HEAD':
            if (file_exists($file))
            {
                header("File size: ".filesize($file));
            }
            break;
            //file content request
        case 'GET':
            if (file_exists($file))
            {
                print_r(file_get_contents($file));
            }
            else
            {
                echo "No such file in directory";
            }
            break;
            //file content update
        case 'POST':
            $fres = fopen($file,"wb");
            fwrite($fres,file_get_contents('php://input'));
            fclose($fres);
            echo "File content was replaced";
            break;
            //file delete
        case 'DELETE':
            if (file_exists($file))
            {
                unlink($file);
                echo "File was deleted";
            }
            else
            {
                echo "No such file in directory";
            }
            break;
            //file content append
        case 'PATCH':
            $fres = fopen($file,"ab");
            fwrite($fres,file_get_contents('php://input'));
            fclose($fres);
            echo "File content was appended";
            break;
    }
}
else
{
    echo "file parameter is not set";
}