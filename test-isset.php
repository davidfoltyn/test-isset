<?php
error_reporting(E_ALL);

class TestClass implements ArrayAccess {
	protected $container = [];

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

$obj = new TestClass;

echo "* Calling isset(\$obj['foo'])...";
var_dump(isset($obj['foo']));
echo "<br><br>";

echo "* Calling isset(\$obj['foo']['bar'])...\n";
var_dump(isset($obj['foo']['bar']));
echo "<br><br>";

echo "* Setting offset...\n";
$obj['foo'] = null;
echo "<br><br>";

echo "* Calling isset(\$obj['foo']['bar'])...\n";
var_dump(isset($obj['foo']['bar']));
