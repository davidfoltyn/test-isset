# test-isset
Test isset in PHP 7.0.6 >

* Calling isset($obj['foo'])...offsetExists('foo') bool(false)

* Calling isset($obj['foo']['bar'])... offsetExists('foo') bool(false)

* Setting offset... offsetSet('foo', NULL)

* Calling isset($obj['foo']['bar'])... offsetExists('foo') bool(false) 