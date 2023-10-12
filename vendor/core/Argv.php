<?php

namespace vendor\core;

class Argv
{
    private array $options = [];

    public function get(): array
    {
        $options = getopt('', ["command:",
                                           "start::",
                                           "offset::",
                                           "version::"]);
        foreach ($options as $key => $val) {
            $this->options[$key] = $val;
         }
        return $this->options;
    }
}