<?php
function check($paragraph, $word)
{

    if (strpos($paragraph, $word) !== false)
        return 1;
    else
        return 0;
}

