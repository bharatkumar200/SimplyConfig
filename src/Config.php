<?php

namespace SimplyDi\SimplyConfig;

use Symfony\Component\Yaml\Yaml;

class Config
{

    private string $file;

    public function __construct(string $file){
        $this->file = $file;
    }

    public function parse()
    {
        return Yaml::parseFile($this->file);
    }

    public function get(string $key): mixed
    {
        $settings = $this->parse();

        $key = explode('.', $key);

        if (count($key) === 1) {
            return $settings[$key[0]] ?? null;
        }

        return $settings[$key[0]][$key[1]] ?? null;
    }

}