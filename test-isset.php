<?php


class TestClass implements ArrayAccess {
	protected $container = array();

	public function offsetExists($index) {
		echo "offsetExists(" . var_export($index, true) . ")\n";
		return isset($this->container[$index]);
	}

	public function offsetGet($index) {
		echo "offsetGet(" . var_export($index, true) . ")\n";
		return $this->container[$index];
	}

	public function offsetSet($index, $value) {
		echo "offsetSet(". var_export($index, true) . ", " . var_export($value, true) . ")\n";
		$this->container[$index] = $value;
	}

	public function offsetUnset($index) {
		echo "offsetUnset(" . var_export($index, true) . ")\n";
		unset($this->container[$index]);
	}

}

class PropertyTest
{
    
    private $data = array();

	public $declared = 1;
    
    private $hidden = 2;


    /** SET **/
    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    /** GET **/
    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_WARNING);
        return null;
    }

    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    public function getHidden()
    {
        return $this->hidden;
    }
}


/**
* simple test
**/

$obj = new TestClass;

echo "<pre>";
echo "calling isset(\$obj['foo'])...";
var_dump(isset($obj['foo']));
echo "\n\n";

echo "calling isset(\$obj['foo']['bar'])...\n";
var_dump(isset($obj['foo']['bar']));
echo "\n\n";

echo "setting offset...\n";
$obj['foo'] = null;
echo "\n\n";

echo "calling isset(\$obj['foo']['bar'])...\n";
var_dump(isset($obj['foo']['bar']));

echo "</pre>";
echo "<hr>";



echo "<pre>";
$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "\n\n";

var_dump(isset($obj->a));
echo "\n\n";

unset($obj->a);
var_dump(isset($obj->a));
echo "\n\n";

echo $obj->declared . "\n\n";

echo $obj->getHidden() . "\n";
echo $obj->hidden . "\n";
echo "</pre>";