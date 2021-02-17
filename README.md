# starterFoundationPress
[![GitHub version](https://badge.fury.io/gh/mifist%2FstarterFoundationPress.svg)](https://github.com/mifist/starterFoundationPress/releases)

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

<p align="center">
  <img width="400" src="screenshot.png">
</p>

This is a starter-theme for WordPress based on [Foundation for Sites 6](https://foundation.zurb.com/sites.html), the most advanced responsive (mobile-first) framework in the world. The purpose of FoundationPress, is to act as a small and handy toolbox that contains the essentials needed to build any design. FoundationPress is meant to be a starting point, not the final product.

Please fork, copy, modify, delete, share or do whatever you like with this.

All contributions are welcome!

Huge thanks to [olefredrik](https://github.com/olefredrik/FoundationPress) (and all contributors) to create the base this starter theme is forked from.

## Requirements

**This project requires [Node.js](http://nodejs.org) v10.x.x to be installed on your machine.** Please be aware that you might encounter problems with the installation if you are using the most current Node version (bleeding edge) with all the latest features.

FoundationPress uses [Sass](http://Sass-lang.com/) (CSS with superpowers). In short, Sass is a CSS pre-processor that allows you to write styles more effectively and tidy. FoundationPress uses the SCSS syntax from Sass. The Sass is compiled using the JavaScript Library of [Dart Sass](https://sass-lang.com/dart-sass) and does not require any external dependencies.

## Quickstart

### 1. Clone the repository and install with npm
```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone https://github.com/mifist/starterFoundationPress.git
$ cd starterFoundationPress
$ npm install
$ composer install
$ npm start
```

### 2. Compile assets for production

When building for production, the CSS and JS will be minified. To minify the assets in your `/dist` folder, run

```bash
$ npm run build
```

#### To create a .zip file of your theme, run:

```
$ npm run package
```

Running this command will build and minify the theme's assets and place a .zip archive of the theme in the `packaged` directory. This excludes the developer files/directories from your theme like `/node_modules`, `/src`, etc. to keep the theme lightweight for transferring the theme to a staging or production server.

### Project structure

Inside of the `/src` folder you will find the working files for all your assets. Every time you make a change to a file that is watched by Grunt, the output will be saved to the `/dist` folder. The contents of the `/dist` folder is the generated code that you should not touch (unless you have a good reason for it).

The `/page-templates` folder contains templates that can be selected in the Pages section of the WordPress admin panel. To create a new page-template, simply create a new file in this folder and make sure to give it a template name.

### Styles and Sass Compilation

 * `style.css`: Required by WordPress to make this theme work properly. **All CSS inside this file won't be enqueued.**

 All styling are handled in the Sass files described below:

 * `src/assets/scss/components/*.scss`: Components like Buttons, Searchbars, Tabs, Accordions, etc. Components are reuseable elements, so design them in a way they can be used independently and in combination with other elements without affecting their appearance.
 * `src/assets/scss/global/*.scss`: Global styles. Define helper classes or element styles here (like a, p, h1, h2, h3, ... ).
 * `src/assets/scss/mixins/*.scss`: Put all your custom SCSS mixins here.
 * `src/assets/scss/modules/*.scss`: Topbar, footer etc. This are more or less sections or combinations of different components and elements.
 * `src/assets/scss/templates/*.scss`: Page template styling. Styles for individual pages especially the ones in `/page-templates`.
 * `src/assets/scss/pages/*.scss`: Places styles for single pages here. Make sure to use a identifier like .page-id-{ID}, .home, etc. Note: in gerneral it's not recommended. Better use a modifier class for the elements you want to change.
 * `src/assets/scss/_foundation.scss`: All Foundation inclues. Uncomment unused styles to reduce filessize.
 * `src/assets/scss/_settings.scss`: All Foundation component styles can be configured here. Also add custom SCSS variables like colors here in the global section.
 * `src/assets/scss/admin.scss`: Entrypoint for admin styles. These are loaded in the WordPress backend.
 * `src/assets/scss/editor.scss`: Entrypoint for editor styles. These are included for the Gutenberg editor.
 * `src/assets/scss/main.scss`: Entrypoint for main styles which are loaded in the front-end.

 * `dist/assets/css/main.css`: This file is loaded in the `<head>` section of your document, and contains the compiled styles for your project.

If you're new to Sass, please note that you need to have Grunt running in the background (`npm start`), for any changes in your scss files to be compiled to `main.css`.

### JavaScript Compilation

All JavaScript files, including theme's modules, are imported through the `src/assets/js/main.js` file. The files are
 imported using module dependency with [webpack](https://webpack.js.org/) as the module bundler.

If you're unfamiliar with modules and module bundling, check out [this resource for node style require/exports](http://openmymind.net/2012/2/3/Node-Require-and-Exports/) and [this resource to understand ES6 modules](http://exploringjs.com/es6/ch_modules.html).

Theme modules are loaded in the `src/assets/js/main.js` file. By default all components are loaded. You can also pick
 and
 choose which modules to include. Just follow the instructions in the file.

If you need to output additional JavaScript files separate from `main.js`, do the following:
* Create new `custom.js` file in `src/assets/js/`. If you will be using jQuery, add `import $ from 'jquery';` at the
 top of the file.
* In `config.yml`, add `src/assets/js/custom.js` to `PATHS.entries`.
* Build (`npm start`)
* You will now have a `custom.js` file outputted to the `dist/assets/js/` directory.

### Translations

To update the `languages/FoundationPress.pot` file for translations install the [WP-CLI](https://make.wordpress.org/cli/handbook/installing/) and run `npm run make-pot`.

To update the `.mo` &  `.po` files for the different languages have a look at [Loco Translate](https://wordpress.org/plugins/loco-translate/).

## Local Development
We recommend using one of the following setups for local WordPress development:

* [MAMP](https://www.mamp.info/en/) (macOS)
* [WAMP](http://www.wampserver.com/en/download-wampserver-64bits/) (Windows)
* [LAMP](https://www.linux.com/learn/easy-lamp-server-installation) (Linux)
* [Local](https://local.getflywheel.com/) (macOS/Windows)
* [VVV (Varying Vagrant Vagrants)](https://github.com/Varying-Vagrant-Vagrants/VVV) (Vagrant Box)
* [Trellis](https://roots.io/trellis/)


## Documentation
* [WordPress Codex](http://codex.wordpress.org/)

#### Pull Requests

Pull requests are highly appreciated. Please follow these guidelines:

1. Solve a problem. Features are great, but even better is cleaning-up and fixing issues in the code that you discover
2. Make sure that your code is bug-free and does not introduce new bugs
3. Create a [pull request](https://help.github.com/articles/creating-a-pull-request)
4. Verify that all the Travis-CI build checks have passed

