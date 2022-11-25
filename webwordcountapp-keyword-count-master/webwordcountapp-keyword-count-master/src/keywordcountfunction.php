<?php

function keywordcount($paragraph, $word) {
    
    if (substr_count($paragraph, $word) !== false) 
        return substr_count($paragraph,$word, 0);
    else
        return 0;

}

?>


