<?php

namespace SimplyDi\SimplyConfig;

use Symfony\Component\Yaml\Yaml;

class Config
{
    private string|array $source;

    public function __construct(string|array $source)
    {
        $this->source = $source;
    }

    public function parse(): array
    {
        $settings = [];

        if (is_array($this->source)) {
            // If the source is an array, treat it as an array of file paths
            foreach ($this->source as $file) {
                $config = Yaml::parseFile($file);
                $settings = array_merge_recursive($settings, $config);
            }
        } else if (is_string($this->source)) {
            // If the source is a string, treat it as a single file path
            $settings = Yaml::parseFile($this->source);
        } else {
            throw new \InvalidArgumentException("Invalid source provided. It should be a folder path or an array of file paths.");
        }

        return $settings;
    }

    public function get(string $key): mixed
    {
        $settings = $this->parse();

        $keys = explode('.', $key);

        $value = $settings;
        foreach ($keys as $subKey) {
            if (!isset($value[$subKey])) {
                return null;
            }
            $value = $value[$subKey];
        }

        return $value;
    }
}
