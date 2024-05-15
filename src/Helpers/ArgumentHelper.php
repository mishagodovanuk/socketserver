<?php

namespace Socket\SocketChat\Helpers;

class ArgumentHelper
{
    public static function getArgument($argv)
    {
        $parsedArgs = [];
        $optionMap = [
            'p' => 'port',
            'h' => 'host'
        ];

        foreach ($argv as $arg) {
            // Check if argument matches the pattern "--key=value" or "-key=value"
            if (preg_match('/^--?(\w+)=(.+)$/', $arg, $matches)) {
                $key = $matches[1];
                $value = $matches[2];

                // Map the key to its corresponding long option (if available)
                $key = $optionMap[$key] ?? $key;

                $parsedArgs[$key] = $value;
            }
        }

        return $parsedArgs;
    }
}