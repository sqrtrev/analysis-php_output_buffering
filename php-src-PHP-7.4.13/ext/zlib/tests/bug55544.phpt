--TEST--
Bug #55544 (ob_gzhandler always conflicts with zlib.output_compression)
--SKIPIF--
<?php
extension_loaded("zlib") or die("skip");
if (substr(PHP_OS, 0, 3) == 'WIN') {
	die("skip not for windows");
}
if (PHP_OS == "Darwin") {
	die("skip not for darwin");
}
?>
--INI--
output_handler=ob_gzhandler
zlib.output_compression=0
--ENV--
HTTP_ACCEPT_ENCODING=gzip
--FILE--
<?php
echo "hi";
?>
--EXPECT--
?      ?? ?*??
--EXPECTHEADERS--
Content-Encoding: gzip
Vary: Accept-Encoding
