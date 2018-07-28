# wp-content

Pozdrav ljudi,

Inače za devlopment koritim Understrap jer ima gulp i Boostrap integriran i koristim child temu.

Nisam baš sve dokumentirao sa komitovima

Instalacija je dokmentirana ovdje

https://github.com/understrap/understrap

Installing Dependencies

$ npm install

NIVAS - Wordpress Task
Instructions:
● Use the latest version of Wordpress.
*  jesam
● The database must have a custom prefix.
*  ok
● You must use version control (the more commits, the better). - Use git/bitbucket.
*  ok
● Only submit your work - not all of the Wordpress files.
*  stavio sam wp-content
● All custom features must be inside a project specific plugin.
*  stavio sam news custom post u news plugin

Before submitting:
● Add the database dump to the root of the project.
*  ok
● Merge everything into master and tag version 1.0.
*  ok
● Send us the link to your repo.
*  ok

Tasks:

1. Edit wp-config to support a different environment
   a. Be able to use the same wp-config to add credentials for development, staging and production.
*  to baš nisam radio, znam ima dosta resursa na netu kao
      https://github.com/studio24/wordpress-multi-env-config/blob/master/wp-config.load.php
*  uglavnom par domena za različite vrste faze, development, staging, default
2. Create a Theme
*  koristim understrap framework https://understrap.com/, ali je blank tema bila
3. Slice and implement the provided design
*  ok
   a. Use your best judgement to decide on what is the content, and what are other

*  k
  stuff like widgets quotes, and how it will be best to implement them so that the editor can make changes.

4. Implement the design inside a custom post type - News

* to je išlo u plguins
  a. Don’t use default posts from Wordpress; use custom!
*  defultni su na homepage a meniju je straktura news/category ...., kao broj 4.c
  b. Create a custom taxonomy for the news post type
*  custom taxonomy category
  c. Create the URL structure:
  i. /news/category-name/ (Top Category)
  ii. /news/category-name/sub-category-name/ (Sub Category)
  iii. /news/category-name/sub-category-name/product-name/ (Single Page)
  iv. /news/ (Display all news,categories and subcategories)
*  u meniju sam stavio strukturu, nažalost nisam mogao do levela 3 jer je boostrap nawalker pa bi trebap modificirati cijeli ili ga zamjeniti, ali ima opcija samo nisam stigao

5. Custom Ajax listing
   a. On the listing page, use swipe pagination with load more via Ajax.
*   neznam gdje bi bio listing page ali stavio sam ispod svakog sinle posta ima magi button koji dohvaća postove ajaxom, slike. Htio sam da dohvaća sliku po sliku ali eto, nisam imao petlje :)
      b. It should be loaded via action_hooks.
*  lodano preko action enque scripts standardna akcija za lodanje skripti i css-a u funkcijama functions.php

Bonus points:
● Boilerplate for plugin.
*  za news
● Use Wordpress Ajax.
*  ima u js/skripta.js, e tu sam dodao one fondove, oni su na testiranju da uzme nek pravi link a ne localhost, i da možda sam trebao neke slike dohvatiti, ali eto nije teško to izmjeniti
● load more should be reusable on other listings.
*  jesam ima u page-templates/loadmore.php, to je taj gumb magic za lodanje id-ova preko API-ja od wp-a

////Dolje su intrukcije za taj understrap

# understrap-child

Basic Child Theme for UnderStrap Theme Framework: https://github.com/holger1411/understrap

## How it works

It shares with the parent theme all PHP files and adds its own functions.php on top of the UnderStrap parent themes functions.php.

IT DID NOT LOAD THE PARENT THEMES CSS FILE(S)!
Instead it uses the UnderStrap Parent Theme as dependency via npm and compiles its own CSS file from it.

Uses the Enqueue method the load and sort the CSS file the right way instead of the old @import method.

## Installation

1. Install the parent theme UnderStrap first: https://github.com/holger1411/understrap

* IMPORTANT: If you download it from GitHub make sure you rename the "understrap-master.zip" file just to "understrap.zip" or you might have problems using this child themes !!

2. Just upload the understrap-child folder to your wp-content/themes directory
3. Go into your WP admin backend
4. Go to "Appearance -> Themes"
5. Activate the UnderStrap Child theme

## Editing

Add your own CSS styles to /sass/theme/\_child_theme.scss
or import you own files into /sass/theme/understrap-child.scss

To overwrite Bootstrap or UnderStraps base variables just add your own value to:
/sass/theme/\_child_theme_variables.scss

For example:
the "$brand-primary" variable is used by both, Bootstrap and UnderStrap.
Add your own color like:
$brand-primary: #ff6600;
in /sass/theme/\_child_theme_variables.scss to overwrite it.
That will change automatically all elements who use this variable.
It will be outputted into:
/css/understrap-child.min.css
and
/css/understrap-child.css

So you have one clean CSS file at the end and just one request.

## Developing With NPM, Gulp, SASS and Browser Sync

### Installing Dependencies

* Make sure you have installed Node.js, Gulp, and Browser-Sync [1] on your computer globally
* Then open your terminal and browse to the location of your UnderStrap copy
* Run: `$ npm install` then: `$ gulp copy-assets`

### Running

To work and compile your Sass files on the fly start:

* `$ gulp watch`

Or, to run with Browser-Sync:

* First change the browser-sync options to reflect your environment in the file `/gulpconfig.json` in the beginning of the file:

```javascript
  "browserSyncOptions" : {
    "proxy": "localhost/wordpress/",
    "notify": false
  }
};
```

* then run: `$ gulp watch-bs`

[1] Visit [https://browsersync.io/](https://browsersync.io/) for more information on Browser Sync

Shorcode - u funkcijama doziva se sa my_blockquote, ima primjer na prvom postu.
Featured tekst - dodan preko plugina ACF, možda je mogao biti ljepši.

Sve sam radio u datotekeama wp-content\themes\understrap-child.

page-templates - predlošci stranica
loop-templates - predlošci petlji
css - understrap-child\sass\theme
js - understrap-child\js
functions - tu su funkcije za sidebar, shortcode itd..

Trebalo bi mi još malo vremena za uređivanje, ali funkcionalnosti su ovdje.

Hvala na vremenu