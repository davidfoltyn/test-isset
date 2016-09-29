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


/**
* simple test
**/

echo "<h3>PHP ".phpversion()."</h3>";

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
