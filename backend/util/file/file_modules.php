<?php

class file
{
    public $dir;
    public $file = array();

    public function __construct($dir, $file)
    {
        $this->dir = $dir;
        $this->file = $file;
    }
    public function move_file()
    {
        $filter = filter_var($this->file[0]['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (preg_match("/\.(png|jpg)$/", $this->file[0]['name'])) {
            if ($filter) {
                move_uploaded_file($this->file[0]['tmp_name'], $this->dir);
            }
        }

        return (string) $filter;
    }
}?>
