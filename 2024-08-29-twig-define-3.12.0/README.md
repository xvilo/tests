# Twig check if block is defined

From 3.12.0 and onward we can not use `{% if block('doesExist') is defined %}` logic anymore. 

How to reproduce:
```bash
$ composer install
$ vendor/bin/twig-linter lint templates
  ERROR  in templates/index.html.twig (line 1)
  >>  1      {% if block('doesNotExist') is defined %}
  >> The "defined" test only works with simple variables. 
      2          <div>
      3              {{ block('doesNotExist')|raw }}

                                                                                                                        
 [WARNING] 0 Twig files have valid syntax and 1 contain errors.                                                         
                                                                                                                        
                                                                                                                        
$ php -v
PHP 8.3.9 (cli) (built: Jul  2 2024 14:10:14) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.3.9, Copyright (c) Zend Technologies
    with Xdebug v3.3.1, Copyright (c) 2002-2023, by Derick Rethans
    with Zend OPcache v8.3.9, Copyright (c), by Zend Technologies
```

How it works:
```bash
$ composer upgrade --prefer-lowest
$ vendor/bin/twig-linter lint templates
PHP Deprecated:  Using ${var} in strings is deprecated, use {$var} instead in /Users/xvilo/projects/tests/2024-08-29-twig-define-3.12.0/vendor/symfony/console/Command/DumpCompletionCommand.php on line 48

Deprecated: Using ${var} in strings is deprecated, use {$var} instead in /Users/xvilo/projects/tests/2024-08-29-twig-define-3.12.0/vendor/symfony/console/Command/DumpCompletionCommand.php on line 48
PHP Deprecated:  Using ${var} in strings is deprecated, use {$var} instead in /Users/xvilo/projects/tests/2024-08-29-twig-define-3.12.0/vendor/symfony/console/Command/DumpCompletionCommand.php on line 56

Deprecated: Using ${var} in strings is deprecated, use {$var} instead in /Users/xvilo/projects/tests/2024-08-29-twig-define-3.12.0/vendor/symfony/console/Command/DumpCompletionCommand.php on line 56

                                                                                                                        
 [OK] All 1 Twig files contain valid syntax.                                                                            
                                                                                                                        

$ php -v
PHP 8.3.9 (cli) (built: Jul  2 2024 14:10:14) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.3.9, Copyright (c) Zend Technologies
    with Xdebug v3.3.1, Copyright (c) 2002-2023, by Derick Rethans
    with Zend OPcache v8.3.9, Copyright (c), by Zend Technologies
```
