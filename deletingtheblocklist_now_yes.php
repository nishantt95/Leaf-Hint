<?php
if(file_exists("_listofblock.txt"))
{
unlink("_listofblock.txt");
echo "Block list has been restored successfully";
}
else
echo "No one is there on the block list";
?>