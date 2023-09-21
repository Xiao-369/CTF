<?php
error_reporting(1);
class SSRF
{
    public $f;
    public $hint;
    
    public function __invoke()
    {
        if (filter_var($this->hint, FILTER_VALIDATE_URL)) {
            $r = parse_url($this->hint);
            if (!empty($this->f)) {
                if (strpos($this->f, "try") !==  false && strpos($this->f, "pass") !== false) {
                    @include($this->f . '.php');//something in hint.php
                } else {
                    die("try again!");
                }
                if (preg_match('/prankhub$/', $r['host'])) {
                    @$out = file_get_contents($this->hint);
                    echo $out;
                } else {
                    die("error");
                }
            } else {
                die("try it!");
            }
        } else {
            die("Invalid URL");
        }
    }
}

class Abandon
{
    public $test;
    public $pop;
    public function __construct()
    {
        $this->test = "";
        $this->pop = "";
    }

    public function __toString()
    {
        return $this->pop['object']->test;
    }

    public function __wakeup()
    {
        if (preg_match("/flag/i", $this->test)) {
            echo "hacker";
            $this->test = "index.php";
        }
    }
}

class Route
{
    public $point;
    public function __construct()
    {
        $this->point = array();
    }

    public function __get($key)
    {
        $function = $this->point;
        return $function();
    }
}

if (isset($_POST['object'])) {
    unserialize($_POST['object']);
}
