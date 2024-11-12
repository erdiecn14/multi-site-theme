[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

# multi_family_theme

## Summery

## This theme was built for and property of Catalyst Marketing

## Installation

### Requirements

`multi_family_theme` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- Advanced Custom Fields Pro
- Gravity Forms

### Setup

To start using all the tools that come with `multi_family_theme` you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

## Organization

## Front End

All front end development files are in src/.

### Available CLI commands

`multi_family_theme` comes packed with CLI commands tailored for WordPress theme development :

- `npm run build` : bundle all JS to public/js/main.min.js, compile sass to public/css/main.min.css, copy assets and lib images to public/
- `npm run watch` : watch files and bundle all JS to public/js, compile sass to public/css, copy assets to public/
- `npm run watch-sass` : watch sass files as they change and compile to public/css/main.min.css
- `npm run build-sass` : compile sass to public/css/main.min.css
