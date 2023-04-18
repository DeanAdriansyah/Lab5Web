<?php
require_once "route.php";
require_once "./requires/database.php";
$moduleName =
  strpos(@$_REQUEST["url"], "/") ? str_split(@$_REQUEST["url"], strpos(@$_REQUEST["url"], "/"))[0] : @$_REQUEST['url'];

$url = [
  "home" => "./views/home.php",
  "create" => "./views/create.php",
  "update" => "./views/update.php",
  "delete" => "./views/delete.php",
  "contact" => "./views/contact.php",
  "about" => "./views/about.php"
];

$routes = new Route($url);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="DeanAdrian">
  <link rel="icon" href="https://avatars.githubusercontent.com/u/93472471?s=400&u=f3dc49a0d0a24aba75623cecd237c3dd9a4b6627&v=4" />
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />

  <!-- css -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Project Praktikum 5 | Dean Adriansyah Asy'ari</title>
</head>

<body class="dark:bg-slate-900 dark:text-white" style="background-color:rgb(135, 206, 235,0.5);">
  <nav class="bg-white border-gray-200 dark:bg-gray-900" style="background-color:RGBA( 0, 0, 255, 0.7 ); color:white;">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="<?= $moduleName == 'update' ? '../home' : ' home' ?>" class="flex items-center cursor-pointer">
        <img src="https://avatars.githubusercontent.com/u/93472471?s=400&u=f3dc49a0d0a24aba75623cecd237c3dd9a4b6627&v=4" class="h-8 mr-3 rounded-full" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white" style="text-shadow: 3px 2px 1px grey;">Dean Adriansyah Asy'ari</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0">
          <li>
            <a href="<?= $moduleName == 'update' ? '../home' : ' home' ?>" class="<?= $moduleName == 'home' || $moduleName == '' ? 'block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500' : 'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' ?>"  style="color:white;" aria-current="page">Home</a>
          </li>
          <li>
            <a href="<?= $moduleName == 'update' ? '../contact' : ' contact' ?>" class="<?= $moduleName == 'contact' || $moduleName == '' ? 'block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500' : 'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' ?>" style="color:white;">Contact</a>
          </li>
          <li>
            <a href="<?= $moduleName == 'update' ? '../about' : ' about' ?>" class="<?= $moduleName == 'about' || $moduleName == '' ? 'block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500' : 'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' ?>" style="color:white;">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="p-5 max-w-[1000px] m-auto">
    <?php $routes->load($moduleName); ?>
  </div>
</body>

</html>