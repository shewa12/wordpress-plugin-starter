# WordPress Plugin Starter
![](https://img.shields.io/badge/Required-PHP%20%3E%3D7.1-blue) ![](https://img.shields.io/badge/Tested%20up%20to-WordPress%206.1-brightgreen)

WordPRess Plugin Starter is a plugin for the WordPress Plugin Developer. This is a  starter plugin for start your new plugin development.

###Advantages
- No need to start everything from scratch
- Standard plugin structure ready
- PSR-4 Composer auto-loading ready
- Gulp task runner ready for making plugin build
- SCSS file to css file convertion ready
- Translation domain-mapping ready

###Todos
1. Clone GIT Repository
2. Run `composer install` command from project root directory
3. Run `npm install` command from project root directory

In the plugin every where **plugin-starter** is used as plugin prefix/slug. **PluginStarter** is used as a namespace. Which you may want to change. To change you can use following **WP CLI** command:

`wp wps replace --slug=some-slug --namespace=NameSpace`

Do not forget to update dummy slug & namespace with real one. After this you need to do update composer class mapping as per new namespace. To do this run below command:

`composer dump-autoload`

That is all :relaxed:

### Task Runner
1. `npm run watch` command to watch changes process scss files to css files
2. `npm run build` to process scss files & make zip build of plugin
3. `npm run make-pot` to create language pot file, WP CLI required
4. `npm run plugin-build` combination of command 2 & 3

### Directory Structure
- #####assets
	- ######js
	- ######css
	- ######languages
	- ######scss
- #####inc
	- ######Assets
	- ######Commands
	- ######Utils
- #####templates
- #####views