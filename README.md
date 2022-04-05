# Plugin Starter

Plugin Starter, a plugin for the WP Plugin Developer. This is starter plugin for start your new plugin. It is consist of basic features that will help to speed up your plugin development. Don't need start everything from scratch!

This plugin contains Ajax Endpoint, WP REST API Endpoint, ShortCode, Gutenberg Block & WP CLI Custom Command, Gulp task runner and much more.

### Coding Standards

    PHP OOP, namespace, abstract, trait has been using. WordPress Coding standards has been using throughout the plugin. PHPCS & WPCS tools are using for maintaining coding standards. 

## Features

1. Backend Admin Page

    On the WordPress admin side there should a menu named Plugin Starter. This page contain user's list and there is a refresh button for refreshing list.

2. Short code [plugin-starter-users-list]

    Short code accept 5 arguments for on-off visibility of table column. By default every column's visibility is on. To off the column's visibility you can pass arguments like below:
    [plugin-starter-users-list id=off] (supported arguments are: id, fname, lname, email, date)

3. Gutenberg Block ( Users List )

    On Gutenberg block there should be a block named "Users List". Add it for show casing user's list table. On the sidebar of block's setting you can manage visibility of table columns.

4. REST API Endpoint ( http://yoursite.com/wp-json/plugin-starter/v1/users )

    There is an API available for making HTTP Request. Endpoint should be like above.

5. Ajax Hook ( wp_ajax_aw_task_user_list, wp_ajax_nopriv_aw_task_user_list )

    Ajax hook available for making ajax request.

6. Custom Command for WP CLI

    There is a command available for updating "Request per hour". By default cache time is for 1 hour. It means it will make HTTP Request 1 time per hour. After 1 hour cache will be expired and it will call remote API for getting user's list. To update 1 time per hour limit WP CLI command is available.

    Command: wp plugin-starter request_per_hour 2 (here 2 is the limit)

## Plugin Requirements

- PHP version 7.0 (min requires, 7.4 recommended) or later. Tested up to PHP 8.0.0
- WordPress version 5.2 or later. Tested up to 5.9

## Installation

1. Unzip files and put inside plugin folder of your website. For local installation path would something like this: /Applications/MAMP/htdocs/your-site/wp-content/plugins/

    That's ALL.

### Composer

    Composer auto loading has been using for auto loading files.

### Node Modules

    Gulp file using for watching & compiling SASS SCSS files. It is also using for making pot file for translation.

### Caching

    For caching using WP native Transient API. That is really for those data that is supposed to be expired. It's really straight forward and works pretty well as expected. It's avoid server environment headache.

## Plugin Extension

    Door is open for extending plugin. Number of hooks are available.
