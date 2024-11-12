[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

# multi_site_theme

## Summary

#### multi_site_theme was developed for Catalyst Marketing and is their proprietary theme.
This theme was designed to be a scalable WordPress solution used across 20+ sites. It maintains a consistent front-end design across all sites while allowing for flexible branding and content updates. Content updates are managed in WordPress using responsive components built with Advanced Custom Fields Pro (ACF), while branding adjustments are made through global ACF fields and an untracked main.scss file. Version-controlled theme updates are managed with Git and deployed across all sites using GitHub Actions.

### Requirements

`multi_site_theme` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- Advanced Custom Fields Pro
- Gravity Forms

### Setup

To start using all the tools that come with `multi_site_theme` you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

## Organization

## Front End

All front end development files are in src/.

### Available CLI commands

`multi_site_theme` comes packed with CLI commands tailored for WordPress theme development :

- `npm run build` : bundle all JS to public/js/main.min.js, compile sass to public/css/main.min.css, copy assets and lib images to public/
- `npm run watch` : watch files and bundle all JS to public/js, compile sass to public/css, copy assets to public/
- `npm run watch-sass` : watch sass files as they change and compile to public/css/main.min.css
- `npm run build-sass` : compile sass to public/css/main.min.css
