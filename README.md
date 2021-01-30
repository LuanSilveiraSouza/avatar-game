<h1 align="center">
Avatar Game
</h1>

<p align="center">
A web app based on Avatar Series universe 
</p>

<p  align="center">
  <img  alt="Repository size"  src="https://img.shields.io/github/repo-size/LuanSilveiraSouza/avatar-game?style=flat-square">

  <a  href="https://github.com/LuanSilveiraSouza/avatar-game/commits/master">
    <img  alt="GitHub last commit"  src="https://img.shields.io/github/last-commit/LuanSilveiraSouza/avatar-game?style=flat-square">
  </a>

  <img  alt="License"  src="https://img.shields.io/badge/license-MIT-8257E5?&style=flat-square">

  <a  href="https://github.com/LuanSilveiraSouza/avatar-game/stargazers">
    <img  alt="Stargazers"  src="https://img.shields.io/github/stars/LuanSilveiraSouza/avatar-game?logo=github&style=flat-square">
  </a>
</p>

# :pushpin: Sumary

* [Introduction](#paperclip-introduction)
* [Features](#clipboard-features)
* [Technologies](#computer-technologies)
* [How to Run](#rocket-how-to-run)
* [Bugs and Issues](#bug-bugs-and-issues)
* [License](#books-license)

# :paperclip: Introduction

This is the final project of English and Web development grade courses of IFRS. It consists in a quiz game with choices and final destinies, all related to the "Avatar: The Last Airbender" Series. 

# :clipboard: Features

* User system with registering, login and admin roles
* Admins can edit all questions, choices and destinies
* Users can see your last games with score and final destiny

# :computer: Technologies

* [PHP](https://www.php.net/)
* [React](https://reactjs.org/)
* [Axios](https://github.com/axios/axios)

# :rocket: How to Run

```bash
# Clone Repository
$ git clone https://github.com/LuanSilveiraSouza/avatar-game.git
```
### Run Backend

```bash
# Go to server folder
$ cd avatar-game/server

# Configure database access in public/index.php
$database->connect("mysql:host={HOST};dbname={DBNAME}", {USER}, {PASSWORD});

#Run Migrations
$ php src/database/migrations/index.php

# Run Application in PHP dev server
$ php -S localhost:3030 -t public
```
Access API at http://localhost:3030/

### Run Web App

```bash
# Go to web folder
$ cd avatar-game/web

# Install Packages
$ yarn install

# Run Application
$ yarn start
```
Access http://localhost:3000/ to see the website.

# :bug: Bugs and Issues

Feel free to open new issues and colaborate with others issues in [Issues](https://github.com/LuanSilveiraSouza/avatar-game/issues).

# :books: License

Released in 2021 under [MIT License](https://opensource.org/licenses/MIT)

Made with :heart: by Luan Souza.