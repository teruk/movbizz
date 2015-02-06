MovBizz
=====================
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

This game is a remake of the C64 game Movie Business. It is a text based game where you choose an actor, a director and a location for your movie. You can advertise your movie in the paper, in the radio or on tv. Create a movie that wins awards and fills your moneybag! But be careful random events can influence your movie production in both, a positive and a negative, way.

This game is based on [Laravel 4.2](http://laravel.com) and [Twitter Bootstrap](http://getbootstrap.com)

### Demo

You can try it [here](http://movbizz.sebbmeyer.de)

### Current features

- Produce a movie by selecting: actor, director, location and title
- Taking and paying back loans
- Advertise your movie
- Dynamic cinema charts
- Awards every 12 rounds
- Random events during production, e.g. drug use, lottery win

### Contributing To MovBizz

**All issues and pull requests should be filed on the [teruk/movbizz](https://github.com/teruk/movbizz) repository. But feel free to fork it and make your own version of the game.** 

### Development notes

[Gulp](http://gulpjs.com/) was used to autoprefix the /public/css/main.css file. Gulpfile.js is included.

### How to install

1. Install [composer](https://getcomposer.org/)
2. Clone [this](https://github.com/teruk/movbizz) repository
3. Run composer update
4. Edit settings for database connection (by creating .env.*.php, or environment variables)
5. Seed the database

### Licence

MovBizz is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT). Every used Laravel 4 package was also licensed under the [MIT license](http://opensource.org/licenses/MIT):

- [laracasts/Commander](https://github.com/laracasts/Commander)
- [laracasts/flash](https://github.com/laracasts/flash)
- [laracasts/Presenter](https://github.com/laracasts/Presenter)
- [fzaninotto/faker](https://github.com/fzaninotto/Faker)
