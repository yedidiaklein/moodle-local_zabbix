# Moodle Zabbix Monitoring Plugin

This plugin is designed to monitor a Moodle site and send relevant metrics to a Zabbix server. It provides a command-line interface (CLI) for fetching data from the Moodle database and sending it to Zabbix.

## Project Structure

The project consists of the following files and directories:

```
moodle-local_zabbix
├── cli
│   ├── fetch_data.php        # CLI script to fetch monitoring data from Moodle
├── lang
│   └── en
│       └── local_zabbix.php   # Language strings for the plugin
├── version.php                # Plugin version and metadata
├── settings.php               # Configuration settings for the plugin
└── README.md                  # Documentation for the project
```

## Installation

1. Download the plugin files and place them in the `local/zabbix` directory of your Moodle installation.
2. Navigate to the Site Administration > Plugins > Install plugins section in Moodle.
3. Follow the prompts to complete the installation.

## Usage

### Fetching Data

To fetch monitoring data from your Moodle site, run the following command:

```
php cli/fetch_data.php
```

This script will connect to the Moodle database and retrieve relevant metrics.

### Sending Data to Zabbix

You have to configure Zabbix agent to call fetch_data.php with needed parameters.

## Contributing

If you would like to contribute to this project, please fork the repository and submit a pull request with your changes.

## License

This project is licensed under the GPL License. See the LICENSE file for more details.