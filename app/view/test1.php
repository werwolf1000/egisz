<?php

echo str_repeat('=', 60) .PHP_EOL;

foreach ($data as $row) {
    echo $row['name'] . str_repeat(' ',30 - mb_strlen($row['name']))  . '| ';
    echo $row['phone'] . str_repeat(' ',70 - mb_strlen($row['phone']))  . '| ';
    echo $row['version'] . str_repeat(' ',2 - mb_strlen($row['version']))  . '| ';
    echo PHP_EOL;
}
echo str_repeat('=', 60) .PHP_EOL;