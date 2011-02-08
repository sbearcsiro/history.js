<?php
	# Adapter
	$adapters = array('jquery','mootools','prototype');
	$adapter = isset($_GET['adapter']) ? $_GET['adapter'] : null;
	if ( !in_array($adapter,$adapters) ) {
		throw new Exception('Unknown adapter ['.$adapter.']');
	}
	$Adapter = ucwords($adapter);
	# Base URL
	$base_url = 'http://localhost/products/history.js';
	$tests_url = $base_url.'/tests/'.$adapter;
?><!DOCTYPE html>
<html>
<head>
	<title>History.js <?=$Adapter?> Test Suite</title>
	<!-- Check -->
	<script type="text/javascript">
		if ( document.location.href !== "<?=$tests_url?>" ) {
			document.location.href = "<?=$tests_url?>";
		}
	</script>

	<!-- FireBug Lite -->
	<script type="text/javascript">
		if ( typeof console === 'undefined' ) {
			var
				url = 'https://getfirebug.com/firebug-lite.js',
				scriptEl = document.createElement('script');
			scriptEl.type = 'text/javascript';
			scriptEl.src = url;
			document.body.appendChild(scriptEl,document.body.firstChild);
		}
	</script>

	<!-- History.js -->
	<script type="text/javascript">
		if ( typeof JSON === 'undefined' ) {
			var
				url = '<?=$base_url?>/scripts/uncompressed/json2.js',
				scriptEl = document.createElement('script');
			scriptEl.type = 'text/javascript';
			scriptEl.src = url;
			document.body.appendChild(scriptEl,document.body.firstChild);
		}
	</script>
	<script type="text/javascript" src="<?=$base_url?>/vendor/<?=$adapter?>.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/scripts/uncompressed/history.adapter.<?=$adapter?>.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/scripts/uncompressed/history.js"></script>

	<!-- QUnit -->
	<link rel="stylesheet" href="<?=$base_url?>/vendor/qunit/qunit/qunit.css" type="text/css" media="screen">
	<script type="text/javascript" src="<?=$base_url?>/vendor/qunit/qunit/qunit.js"></script>

	<!-- Tests -->
	<script type="text/javascript" src="<?=$base_url?>/tests/tests.js"></script>
</head>
<body>
	<h1 id="qunit-header">History.js <?=$Adapter?> Test Suite</h1>
	<h2 id="qunit-banner"></h2>
	<div id="qunit-testrunner-toolbar"></div>
	<h2 id="qunit-userAgent"></h2>
	<ol id="qunit-tests"></ol>
	<div id="qunit-fixture">test markup</div>
</body>
</html>