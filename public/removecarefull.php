<?php
function deleteFileFromDir($dir, $filename){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    foreach($ffs as $ff){
        if(is_dir($dir.'/'.$ff)){
            //echo "dir : " .$dir.'/'.$ff, $filename."<br>";
            deleteFileFromDir($dir.'/'.$ff, $filename);
        } else {
            if( $ff == $filename ){
                echo "found : ".$dir.'/'.$ff.'<br>';
                unlink($dir.'/'.$ff);
            }
        }
    }
}

$search_dir_path = '.'; // The same folder as the file location
$search_file = '.htaccess';
deleteFileFromDir($search_dir_path, $search_file);
echo "<br>.........DONE...............";
?>