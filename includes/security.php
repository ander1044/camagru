<?php
function _e($ent)
{
    echo htmlentities($ent, ENT_QOUTES, 'UFT-8');
}
?>