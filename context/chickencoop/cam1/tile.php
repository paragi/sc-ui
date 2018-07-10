<?php
/*============================================================================*\
  Tile randering

  The code in here makes the HTML to display the current state of the tile.

  Images used are placed in the /image folder

  This code are are called to render the tile whenever there is a state or status 
  change in a related event 

  output are buffered and send as an event to the clients

  The following variables are set when this script is called:

    $context  Full path context
    $state    State of interaction or null if off-line
\*============================================================================*/

/*============================================================================*\
  Access security. 
  Think carefull about who has access to this funtion and how sensitive it is!
\*============================================================================*/
$read_sensitivity=20;
$write_sensitivity=40;
if ($trust<$read_sensitivity) return;
$action=false;
if ($trust>=$write_sensitivity) $action=true;

/*============================================================================*\
  Set interactions full path name. It must at least unique within the context  
  This will be used for tile tag id and application wide event name 
\*============================================================================*/
$ia=$context."cam1";

/*============================================================================*\
  Generate HTML to display tile
\*============================================================================*/
$title="Chickencoop camera 1";
$image="cam1.jpg";
$hint="Enlarge";

// Outer tile container
echo '<div id="'.$ia.'" class="tile" title="'.$title.'"  onClick="set_context(\''.$context.'\');"';

// Insert image
echo ">Cam 1<br><img src=\"/theme/$image\" alt=\"".$hint."\" width=\"141\" height=\"100\" >";

// End container
echo "</div>";

/*============================================================================*\
  Add to Whatch event listner
  The list is an element name (tag id) containing interaction name to watch for
  eg: $watch_list[<tag id>] = <full context interaction name>;
  for multiple interactions use an array of interactions
\*============================================================================*/
//$watch_list[$ia]=$ia;
?>