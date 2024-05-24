<!-- Studiengang: MultiMediaTechnology / FHS
Zweck: MultiMediaProjekt 1
Autor: Xaver Rath -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>VERSE</title>
  <link rel="stylesheet" href="dist/output.css">
  <link rel="stylesheet" href="dist/animation.css">
  <link rel="stylesheet" href="dist/stray.css">
  <link rel="icon" href="textures/verse2.ico" type="image/x-icon">


</head>
<body class="flex flex-col justify-around">
  <header>
  <nav class="bg-yellow-200 dark:bg-yellow-200">
      <div class="max-w-[90%] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
        <div class="flex-shrink-0">
  <a href="index.php">
    <img class="h-15 w-15" src="textures/VERSE.svg" alt="Logo">
  </a>
</div>

          <!-- Navigation Links -->
          <div class="hidden md:flex items-center space-x-4">
            <div class="ml-auto flex items-baseline space-x-4">
              <a href="changesong.php" class="text-black hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">random song</a>
              <a href="dailysong.php" class="text-black hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">song of the day</a>
              <a href="#" id="open-modal" class="text-black hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">how to play</a>
            </div>
          </div>

          <!-- Mobile Menu -->
          <div class="md:hidden">
            <button type="button" id="burger-menu" class="bg-gray-900 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">Open main menu</span>
              <!-- Hamburger icon from w3 schools -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
          </div>
        </div>

        <div id="mobile-menu" class="md:hidden hidden opacity-0 transition-opacity duration-300">
          <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="changesong.php" class="text-black hover:text-gray-500 block px-3 py-2 rounded-md text-base font-medium">random song</a>
            <a href="dailysong.php" class="text-black hover:text-gray-500 block px-3 py-2 rounded-md text-base font-medium">song of the day</a>
            <a href="#" id="mobile-open-modal" class="text-black hover:text-gray-500 block px-3 py-2 rounded-md text-base font-medium">how to play</a>
          </div>
        </div>
      </div>
    </nav>

    <div id="headerModal" class="fixed inset-0 flex items-center justify-center  bg-black bg-opacity-50 hidden">
  <div class="bg-yellow-200 p-4 rounded-lg w-auto max-w-[90%] border-black border-2">
    <h2 class="text-gray-800 mb-4 font-bold">How to Play the Game:</h2>
    <ul class="list-disc ml-8">
      <li class="text-gray-800">You will be given one line of the lyrics of a song.</li>
      <li class="text-gray-800">Your task is to guess the title of the song by typing it in.</li>
      <li class="text-gray-800">If your guess is incorrect, another line of the song will appear.</li>
      <li class="text-gray-800">You have a total of 5 guesses to correctly guess the song.</li>
    </ul>
    <button id="close-modal" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded-md">got it!</button>
  </div>
</div>



    <script src="headermodal.js"></script>
  </header>

