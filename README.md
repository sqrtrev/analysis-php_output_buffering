# PHP Output Buffering Analysis

### The Ideas (Guessing)

- Imagine that code allocates memory for header by following `php.ini`
- Maybe PHP will communicate over socket also. So, assume that socket send only fixed bytes following `php.ini`
- Assume that PHP stores response as a temporary file. When PHP send it, it only reads n bytes from temporary file by following `php.ini`
- If the stored buffer size reached limit, PHP will send this first.



### Analysis

- STD_PHP_INI_ENTRY

- The error, `Cannot modify header information - headers already sent by`
- - from `main/SAPI.c`
  - at function `SAPI_API int sapi_header_op(sapi_header_op_enum op, void *arg)`
  - Firstly, checks `sapi_globals.headers_sent` and `sapi_globals.request_info.no_headers`
  - call `php_output_get_start_filename()` and check if this exists.
  - exists -> header sent error with file name + line
  - non_exists -> header sent error without any additional information
- Key point must be `sapi_globals.headers_sent` and `sapi_globals.request_info.no_headers`

- The function, `sapi_send_headers`, set `sapi_globals.headers_sent` as `1`
- this function is called from `sapi/apache2handler/sapi_apache2.c`'s `php_apache2_sapi_flush` function
- - this function set `sapi_globals.headers_sent` as 1 also
  - there is a static variable which contains this function and named `apache2_sapi_module`
- it looks like error is handled with another way. Need to check
- `Unknown hashing algorithm` from `ext/hash/hash.c`
- - used `php_error_docref` function for trigger an error message
  - which is defined at `main/main.c` and it calls `php_verror` function locally.
  - `php_error` is `zend_error` (defined via macro)
  - `zend_error` is defined at `Zend/zend.c` and calls `zend_error_va_list`
  - - 

