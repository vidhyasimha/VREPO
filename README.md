# PHP and Apache Installation Repository

This repository contains PHP and Apache packages for installation via Ansible.

## Structure

- `install.php`: Main script for package installation
- `apache/`: Directory containing Apache versions and configurations
- `php/`: Directory containing PHP versions, extensions, and configurations
- `scripts/`: Directory containing installation scripts and common functions

## Supported Versions

Apache:
- 2.4
- 2.2

PHP:
- 7.4
- 8.0

## Usage

This repository is intended to be used with an Ansible playbook for automated installation.

To install a package:
```
php install.php <software> <version>
```

Example:
```
php install.php apache 2.4
php install.php php 7.4
```

## Adding New Versions

To add a new version:
1. Create a new directory under the respective software folder (e.g., `apache/2.6/` or `php/8.1/`)
2. Add the necessary files (source tarball, configurations, modules/extensions)
3. Update the README to reflect the new supported version
