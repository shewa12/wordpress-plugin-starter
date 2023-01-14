# WordPress Plugin Starter
![](https://img.shields.io/badge/Required-PHP%20%3E%3D7.1-blue) ![](https://img.shields.io/badge/Tested%20up%20to-WordPress%206.1-brightgreen)

WordPress Plugin Starter is a plugin for the WordPress Plugin Developer. This is a  starter plugin for starting your new plugin development.

### Advantages
- No need to start everything from scratch
- Standard plugin structure ready
- PSR-4 Composer auto-loading ready
- Gulp task runner ready for making plugin build
- SCSS file to CSS file conversion ready
- Translation domain mapping ready

### Todos
1. Clone GIT Repository
2. Run `composer install` command from the project root directory
3. Run `npm install` command from the project root directory
4. Activate the plugin, on the admin side you should see a console message: **Hello WPS User** . All set :grin:

	In the plugin every where **plugin-starter** is used as plugin prefix/slug. **PluginStarter** is used as a namespace. Which you may want to change. To change you can use the following **WP CLI** command:

	`wp wps replace --slug=some-slug --namespace=NameSpace`

	Do not forget to update the dummy slug & namespace with the real one. After this, you need to update the composer class mapping as per the new namespace. To do this run the below command:

	`composer dump-autoload`

	That is all :relaxed:

### Task Runner
1. `npm run watch` command to watch changes process SCSS files to CSS files
2. `npm run build` to process SCSS files & make a zip build of plugin
3. `npm run make-pot` to create language POT file, WP CLI required
4. `npm run plugin-build` combination of commands 2 & 3

### Directory Structure
- ##### assets
	- ###### js
	- ###### css
	- ###### languages
	- ###### scss
- ##### inc
	- ###### Assets
	- ###### Commands
	- ###### Utils
- ##### templates
- ##### views

### Extension
New services/classes should be placed inside **inc**  directory with a separate directory. Then to import new services/classes open the plugin main file & change the code like below:

    <?php
        use PluginStarter\Assets\Enqueue;
        use PluginStarter\Commands\RegisterCommands;
		use YourNewClasses;

	   public function load_packages() {
			new Enqueue();
			new RegisterCommands();
			new YourNewClasses();
		}
    ?>
    

Imported new class at line no 4 & object created at line no: 9. Import statements laying on top of the file and `load_packages` method on the bottom of the file.
