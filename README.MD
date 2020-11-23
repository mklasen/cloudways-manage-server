## Cloudways Server Management

This tool allows you to restart PHP-FPM without accessing the Cloudways UI.

### How to setup?
1. Login to your server via SSH
2. Create a directory called tools (`mkdir ~/tools`)
3. `cd ~/tools/`
4. `git clone git@github.com:mklasen/cloudways-manage-server.git`
5. `cd cloudways-manage-server`
6. Copy the .env.example to .env (`cp .env.example .env`)
7. `composer install`
8. Update the EMAIL_ADDRESS and API_KEY parameters with the correct ones.
9. run restart-php-fpm.php

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