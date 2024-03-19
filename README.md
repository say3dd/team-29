<!-- PROJECT SHIELDS -->
[![Contributors][contributors-shield]][contributors-url]
<!-- PROJECT LOGO -->
<div align="center">
  <a href="https://github.com/say3dd/team-29">
    <img width="484" alt="image" src="https://github.com/say3dd/team-29/assets/123840502/1d84db3a-2dd4-415a-ac06-d452e7ca4497">
  </a>

<h3 align="center">Team 29 - Valhalla</h3>

  <p align="center">
    An E-Commerce website selling gaming laptops
    <br/>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
## Table of Contents:
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#the-team">The Team</a></li>
  </ol>



<!-- ABOUT THE PROJECT -->
## About The Project

<img width="948" alt="image" src="https://github.com/say3dd/team-29/assets/123840502/52e85bbf-0e23-446e-91d5-bb2888d969d2">

Team-29's submission for Aston University's CS2TP Project, where we are given the task to create an E-Commerce website.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With
* ![HTML5]
* ![CSS3]
* ![Javascript-img]
* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JQuery][JQuery.com]][JQuery-url]
* ![TailwindCSS]

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- GETTING STARTED -->
## Getting Started

This section will guide you through setting up the project to run locally on your machine for development and testing purposes.

### Prerequisites

* NodeJS - https://nodejs.org/en/download
* NPM (Installed with NodeJS above)
* PHP - https://www.php.net/downloads.php
* Composer - https://getcomposer.org/download/

### Installation

1. Clone this repository into a folder of your choice using the command:
```sh
git clone https://github.com/say3dd/team-29.git
```
2. Open this folder in an IDE of your choice.
3. Open up an integrated terminal at this point of the folder and type in the command
 ```sh
cd team-29/valhalla 
```
4. Once entered into the valhalla directory, run the command in the terminal
```sh
composer install
```
5. Next, run the command 
```sh
npm install
```
6. Generate your `.env` file by running the command
```sh
cp .env.example .env
```
   - If you would like at this point, to change the name of the database, instead of it just being "laravel", you can do so by changing the `DB_DATABASE` variable in the `.env` file, to whatever you would like.
7. Run the command
```sh
php artisan migrate
```
  - If prompted to create a database named "laravel" or what database name you chose, type in "yes"
8. Run the command
```sh
php artisan db:seed
```
9. Generate your unique application key using the command
```sh
php artisan key:generate
```
  - NOTE: DO NOT SHARE THIS WITH ANYONE
10. Open up another integrated terminal and run the command `cd team-29/valhalla`. On this terminal also run the command
```sh
npm run dev
```
11. Finally, open up another integrated terminal, run the command `cd team-29/valhalla`. On this terminal also run the command
```sh
php artisan serve
```
12. This website will now be visible (in development) via the URL http://127.0.0.1:8000/
  - If you want to run it in production, instead of `npm run dev` in step 10, run the command `npm run prod`


<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTRIBUTING -->
## Contributing

Unfortunately you cannot contribute to the project. You can create pull requests, but they will not be reviewed and added to the project.

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- The team -->

## The team: 
<li> Bilal Mohamed - </li> 
<li> Elizaveta Mikheeva - </li>
<li> Abubakarsiddik Mohammed - </li> 
<li> Basit Mohamed - </li>
<li> Anthony Resuello - </li> 
<li> Francis Moran - </li> 
<li> Mohammed Miah - </li> 


<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/say3dd/team-29.svg?style=for-the-badge
[contributors-url]: https://github.com/say3dd/team-29/graphs/contributors
[product-screenshot]: images/screenshot.png
[HTML5]: https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white
[CSS3]: https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white
[Javascript-img]: https://camo.githubusercontent.com/53ec2e58e03ba275d9b3a386abd96a243cf744a1a7121bdf8262fc8ae6ebc335/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f6a6176617363726970742d2532333332333333302e7376673f7374796c653d666f722d7468652d6261646765266c6f676f3d6a617661736372697074266c6f676f436f6c6f723d253233463744463145
[TailwindCSS]: https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white 
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
