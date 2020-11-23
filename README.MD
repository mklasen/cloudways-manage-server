## Cloudways Server Management

This tool allows you to restart PHP-FPM without accessing the Cloudways UI.

### How to setup?
1. Copy the .env.example to .env
2. Update the EMAIL_ADDRESS and API_KEY parameters with the correct ones.
3. run restart-php-fpm.php

### Integrating in deployer
```
// Restart PHP-FPM
task (
	'deploy:restart_php-fpm',
	function() {
		writeln( ' - Restart PHP-FPM' );
		run( 'php ~/scripts/cloudways-management-tools/restart-php-fpm.php' );
	}
)
```