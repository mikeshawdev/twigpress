=== TwigPress ===
Contributors: MikeShaw217
Tags: twig,templates,themes
Requires at least: 4.1
Tested up to: 4.1
Stable tag: 1.1.2
Version: 1.1.2
License: GPL-2.0+

This plugin provides a simple way for you to use the Twig templating system within WordPress themes.


== Description ==

This plugin provides a simple way for you to use the [Twig templating engine](http://twig.sensiolabs.org/) with [WordPress](http://wordpress.org/) themes. A problem with WordPress themes is that it is very easy to create templates that are a mess of PHP and HTML. This isn't good for working with neither does it provide a separation of concerns. The [Twig templating engine](http://twig.sensiolabs.org/) is a great engine that allows you to separate out getting & manipulating your data and rendering it out. You create your themes in the same way as before, only you render a template instead of using PHP within your page structure.

The Installation section provides the steps to using this plugin with your theme.

In the Other Notes section, there is an easy reference for the different functions/filters and what they can be used for.

For Twig, the [Twig documentation](http://twig.sensiolabs.org/documentation) is the best resource I can offer. It is extremely well documented.

== Installation ==

1. Download the plugin from WordPress, either directly or through the plugins admin screen
        - If you download the files directly, upload them to your `/wp-content/plugins/` directory
2. Place the Twig files in your `wp-content` directory, `Autoloader.php` should reside at `wp-content/Twig/Autoloader.php`
3. Create a 'twigs' directory inside your theme folder, place your Twig templates in here
4. Activate the plugin through the 'Plugins' menu in WordPress
5. Use the `twigpress_render_twig_template()` function in your PHP files to render templates

== Functions and Filters ==

<br />

= Functions =

<br />

`twigpress_render_twig_template($vals = array(), $template = false, $echo = true)`

Calling this function renders a `$template` with the values passed in `$vals`. You can also choose a specific template to render and whether you would like to echo the template or simply return it.

There is no need to explicitly set the `$template` name. If this is left to the default, the plugin will look for a template with the same name as the PHP file being rendered (with a '.twig' extension). For example, if `front-page.php` is being rendered the plugin will attempt to find `front-page.twig`.

If you wish to simply return the rendered template, set `$echo` to `false`.

<br />

`twigpress_get_the_content()`

Use this function to get the content for the post you are dealing with. If you use `get_the_content`, WordPress returns the unformatted content and the `the_content` filter is not applied. `twigpress_get_the_content()` takes care of both of these tasks.

<br />

= Filters =

<br />

`twigpress_twig_site_variables`

This filter is applied when the plugin is instantiated, on the 'init' action, and allows you to alter the array of variables that are passed to the Twig environment when it is first created. As such, these variables are available to all templates. This filter is best suited for site-wide information. For post-specific variables, use the `twigpress_twig_post_template_vars` filter.

Defaults:

	'site' => array(
		'lang_attributes' => get_bloginfo('language'),
		'charset' => get_bloginfo('charset'),
		'url' => get_bloginfo('url'),
		'stylesheet_directory' => get_stylesheet_directory_uri(),
		'title' => get_bloginfo('name'),
		'description' => get_bloginfo('description')
	)

In templates these would be accessible through, for example, `{{ site.stylesheet_directory }}`.

<br />

`twigpress_twig_global_functions`

There will be times when you need to use PHP functions in your templates, and there is no way to capture their content to pass to the template when it is rendered. This filter gives you access to the array of functions that are added to the Twig environment, making them available for calling in your templates.

Defaults: `wp_head()`, `wp_footer()`, `wp_title()`, `body_class()`, `wp_nav_menu()`

<br />

`twigpress_twig_post_template_vars`

This filter is applied to your passed array of `$vars` immediately before the template is rendered. This filter is ideal for when you have a set of default variables you wish to include in every template, but are related to posts not the entire site.


== Changelog ==

= 1.1.2 =
* [Added] If WP_DEBUG is enabled, turn on debugging in the Twig environment

= 1.1.1 =
* Strict variables are no longer enforced

= 1.1.0 =
* [Added] TwigPress now sets up a template cache in your theme folder
* [Added] TwigPress sets the Twig core to recompile templates when the source code changes
* [Added] TwigPress sets the Twig core to enforce strict variables, which stops silent failure

= 1.0.1 =
* Minor changes to codebase

= 1.0.0 =
* Initial release
