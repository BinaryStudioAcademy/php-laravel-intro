<?php

$envString = file_get_contents('.env');

$envFile = str_replace("/_NEWLINE_/", "\n", $envString);

file_put_contents('.env', $envFile);
