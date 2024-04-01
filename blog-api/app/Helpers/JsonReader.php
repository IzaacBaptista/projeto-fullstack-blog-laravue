<?php

namespace App\Helpers;

use Illuminate\Filesystem\Filesystem;

class JsonReader extends Filesystem
{
    protected $file;

    public $contents;

    public function read($file)
    {
        $this->file = $file;

        $this->readFile();
    }

    protected function readFile()
    {
        if ($this->exists($this->file)) {
            $this->contents = $this->get($this->file);
        }
    }

    public function export()
    {
        if (strlen($this->contents)) {
            $items = json_decode($this->contents, true);

            return array_map(function ($item) {
                return (array) $item;
            }, $items);
        }

        return [];
    }
}
