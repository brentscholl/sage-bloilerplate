# Cloud Creations Boilerplate Notes
- [Getting Started](#getting-started)
- [Development](#development)
- [WordPress Set Up](#wordpress-set-up)
- [HTML and Blade Templates](#html-and-blade-templates)
  - [Blade Components](#blade-components)
  - [WordPress Page Templates](#wordpress-page-templates)
- [Advanced Custom Fields Pro](#advanced-custom-fields-pro)
  - [Using Flexible Content](#using-flexible-content)
  - [Options Page](#options-page)
- [Components Library](#components-library)
- [JavaScript](#javascript)
- [Grid & Bootstrap](#grid--bootstrap)
  - [CSS Grid Breakpoints](#css-grid-breakpoints)
- [Menus](#menu)
- [Scroll to animations](#scroll-to-animations)
  - [Delays](#delays)
- [Requirements](#requirements)
- [Theme Installation](#theme-installation)
- [Theme Structure](#theme-structure)

## Getting Started
1. Run `composer install` from the root of the theme
2. If you do not have yarn, install yarn by running `npm install --global yarn`
3. Once you have yarn, run `yarn` from the theme directory to install dependencies
4. Choose which css pre-processor you would like to use in `webpack.mix.js`. Both LESS (default) and SASS available.
5. To use Browsersync be sure to set your local dev url `.browserSync('your-local-dev-url.test');` in `webpack.mix.js`
6. Finally, run `yarn start` (if you want to begin the file watcher) or `yarn build` (if you want to just do the initial compile)

 If using less, start with editing the `variables.less` file. 

<br><br>
## Development 
- `yarn start` — Compile assets when file changes are made, start Browsersync session
- `yarn build` — Compile and optimize the files in your assets directory
- `yarn build:production` — Compile assets for production

<br><br>
## WordPress Set Up
- Edit `app/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, and sidebars.
- Add custom filters to `app/filters.php`
- Add custom helper functions to `app/helpers.php`

<br><br>
## HTML and Blade Templates
- This Boilerplate has removed the original Sage code from `index.php`.
    - You can find the primary layout in `resources/views/layouts/app.blade.php`
    - You can find the `<head>` in `resources/views/layouts/header.blade.php`
    - You can find the closing `</body>` in `resources/views/layouts/footer.blade.php`

<br><br>
### Blade Components
- Any blade components created in `resources/views/components` can be used in other blade files using this syntax:

```sh
# → /views/components/my-component.blade.php:
<x-my-component />
OR
# → /views/components/folder/my-component.blade.php
<x-folder.my-component />
```

- Blade components can only have 1 root elements
```sh
Correct:
______________
<div>
    <h1>Hello World</h1>
    <h2>Hello Moon</h2>
</div>

Wrong:
______________
<h1>Hello World</h1>
<h2>Hello Moon</h2>
```

- You can pass a variable to a component.
Example: We can set my-component's `$foo` variable as `$bar`
```sh
<x-my-component :foo="$bar" />
```

- You can do php in blade 2 ways
    - For a single line of php you can use `@php()` ie. `@php($foo = 'bar')`
    - For multiple lines of php you can use `@php @endphp` ie
    ```sh
    @php
        $foo = array('item', 'item');
        do_someting($foo[0]);
    @endphp
    ```
    - Note: we noticed that sometimes `@php` does not work. use `<?php ?>` instead if that's the case
      <br><br>
- For more on blade, see https://laravel.com/docs/8.x/blade

<br><br>
### WordPress Page Templates
- To create a new WordPress template, copy and paste the `template-custom.blade.php` found in `resources/views`. Then update the `Template Name:` comment at the top of the file.

<br><br>
## Advanced Custom Fields Pro
- We commonly use Advanced Custom Fields Pro. Fields can be grabbed easily using this syntax 
```sh
@php($foo = get_field('foo'))
```
- To see the contents / array of the above `$foo` you can use `@dd()` ie. `@dd($foo)`. This will print the `$foo` values to the page.

### Using Flexible Content
```sh
@php($flexible = get_field('flex_content')) # → Get the field
@if($flexible) # → Check if field exists
    @foreach ($flexible as $flex) # → Loop through each layout in flexible content field
        @if($flex['acf_fc_layout'] == 'my-component') # → Check if current item is of this layout
            <x-my-component :component="$flex" /> # → Layout Component
        @endif
    @endforeach
@endif
```

### Options Page
To add the options pages, add this code to `functions.php`
```sh
/*
 * Add ACF Options Page
 */
if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Options',
        'menu_title'	=> 'Options',
        'menu_slug' 	=> 'options',
    ));
}
```
You can grab a field from the option page in your blade template using this syntax:
```sh
{{ get_field('[YOUR_FIELD]', 'options') }}
```
See https://www.advancedcustomfields.com/resources/options-page/ for more information

<br><br>
## Components Library
- A library of components containing html, js, css, and php can be cloned into your `[THEME_ROOT]/resources/` directory. These can be easily copied and pasted in your project.
    - `git clone git@github.com:cloud-creations/component_library.git`
- #### ** Please delete the `resources/components_library` when project is complete. **

<br><br>
## JavaScript
- Use `resources/scripts/app.js` for main js scripts. 
- Find JavaScript snippets @ `resources/component_library/snippets.js`
- When installing new scripts with npm be sure to include the package at the top of `resources/scripts/app.js`. ie `npm install slideout`
```
import Slideout from 'slideout';
```
- jQuery is supported out of the box

<br><br>
## Grid & Bootstrap
https://getbootstrap.com/docs/4.5/layout/grid/
- The bootstrap grid is applied and can be found at `resources/less/common/bootstrap/grid.less`. To enable bootstrap css, uncomment "bootstrap.less" from `app.less`

<br><br>
### CSS Grid Breakpoints
- See `resources/less/common/mixins.less` for breakpoint mixins. ie. `.lg()`, `.md()`, `.sm()`, etc. These breakpoints mixins can be used to apply media query styling at to correct grid breakpoints. Breakpoint dimensions are written in comments of mixins
    
    Example:
    ```sh
    nav {
      font-size:20px;
      .md({
        font-size:15px; # → applied to md and smaller
      });
    }
    ```

<br><br>
## Menus
- This Boilerplate includes a prebuilt Nav and Mega Nav
    - Find HTML @ `resources/views/partials/nav.blade.php` and `resources/views/partials/mega-nav.blade.php`. Include the nav you are using above `#panel` in `resources/layouts/header.blade.php`
    - Find CSS @ `resources/less/header.less`
    - Find JS @ `resources/scripts/app.js` `scroller()`

<br><br>
## Scroll to animations
- This Boilerplate includes ready to use scroll to animations
- To use a scroll to animation, add the class `.animation-element` to an element you want to trigger a scroll to animation on. Once this element is in view, it will trigger the animation for itself and it's children. 
- You can find a library of animations in `resources/less/common/animations.less`
    - add the animation classes to elements you want to animate. (be sure the class in uncommented in `animations.less`)
    
    Example:
  
  Once `#my-div` is in view, it will fade in
    ```sh
  <div id="my-div" class="animation-element fade-in">Foobar<div>
    ```
  
  Once `#my-div` is in view, it's children will fade in.
    ```sh
   <div id="my-div" class="animation-element">
        <div class="fade-in">Foobar</div>
        <div class="fade-in">Foobar</div>
        <div class="fade-in">Foobar</div>
   <div>
    ```
  <small>Note: you do not need `animation-element` on every element you want to animate. `.animation-element` is just the element that triggers the animations once it's in view for itself and it's children.</small>
  #### Delays
  You may not want all children to animate at the same time. You can delay their animation by using the `.aniamtion-delay-[DELAY]` class (see `animations.less` for list of animation delays)
  
  Example:
    ```sh
     <div id="my-div" class="animation-element">
          <div class="fade-in">Foobar</div> # → Fades in first
          <div class="fade-in aniamtion-delay-2">Foobar</div> # → Fades in 2ms later
          <div class="slide-in-right aniamtion-delay-4">Foobar</div> # → Slides in 4ms later
     <div>
    ```
  
- You can find the javascript that controls the triggering of these animations at `resources/scripts/app.js` `animateOnScroll()`

<br><br>
## Requirements

Make sure all dependencies have been installed before moving on:

- [WordPress](https://wordpress.org/) >= 5.4
- [PHP](https://secure.php.net/manual/en/install.php) >= 7.3.0 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
- [Composer](https://getcomposer.org/download/)
- [Node.js](http://nodejs.org/) >= 12.14.0
- [Yarn](https://yarnpkg.com/en/docs/install)

<br><br>
## Theme Installation

To add theme to your project simply `git clone git@github.com:cloud-creations/sage.git` from your root `themes` directory

<br><br>
## Theme Structure

```sh
themes/sage/                # → Root of your Sage based theme
├── app/                    # → Theme PHP
│   ├── View/               # → View models
│   ├── Providers/          # → Service providers
│   ├── admin.php           # → Theme customizer setup
│   ├── filters.php         # → Theme filters
│   ├── helpers.php         # → Helper functions
│   └── setup.php           # → Theme setup
├── bootstrap/              # → Acorn bootstrap
│   ├── cache/              # → Acorn cache location (never edit)
│   └── app.php             # → Acorn application bootloader
├── config/                 # → Config files
│   ├── app.php             # → Application configuration
│   ├── assets.php          # → Asset configuration
│   ├── filesystems.php     # → Filesystems configuration
│   ├── logging.php         # → Logging configuration
│   └── view.php            # → View configuration
├── composer.json           # → Autoloading for `app/` files
├── composer.lock           # → Composer lock file (never edit)
├── public/                 # → Built theme assets (never edit)
├── functions.php           # → Theme bootloader
├── index.php               # → Theme template wrapper
├── node_modules/           # → Node.js packages (never edit)
├── package.json            # → Node.js dependencies and scripts
├── resources/              # → Theme assets and templates
│   ├── fonts/              # → Theme fonts
│       ├── @fortawesome/   # → Fontawesome fonts 
│   ├── images/             # → Theme images
│   ├── scripts/            # → Theme javascript
│       ├── app.js/         # → Main js file. 
│   ├── less/               # → Theme less styles
│       ├── common/         # → Commonly used less styles, not particular to a component or page
│       ├── components/     # → Component Less style. used in sync with view/components
│       ├── layouts/        # → Base Layout less styles
│       └── app.less        # → Main less file. include all new less files here
│   ├── sass/               # → Theme sass styles
│       ├── common/         # → Commonly used sass styles, not particular to a component or page
│   ├── styles/             # → Theme stylesheets
│   └── views/              # → Theme templates
│       ├── components/     # → Component templates
│       ├── content/        # → Content templates. Used for inside wordpress loops
│       ├── form/           # → Form templates
│       ├── layouts/        # → Base templates
│       └── partials/       # → Partial templates
├── screenshot.png          # → Theme screenshot for WP admin
├── storage/                # → Storage location for cache (never edit)
├── style.css               # → Theme meta information
├── vendor/                 # → Composer packages (never edit)
├── tailwind.config.js/     # → Tailwind configuration
└── webpack.mix.js          # → Laravel Mix configuration
```

<br><br>
<p>
  <strong>Cloud Creations's WordPress starter theme Built off of Sage 10 by roots</strong>
</p>

<p>
  <a href="https://roots.io">Official Website</a> | <a href="https://roots.io/docs/sage/">Documentation</a>
</p>
