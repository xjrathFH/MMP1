<!-- Studiengang: MultiMediaTechnology / FHS
Zweck: MultiMediaProjekt 1
Autor: Xaver Rath -->
<?php
include "functions.php";
$pagetitle = "Verse";
include "header.php";
$tries = 5; // Number of tries
?>
<main>
<div id="swag">
<div class="container mx-auto px-4 py-4 mt-5 md:mt-auto md:grid md:grid-cols-4 gap-4 md:gap-12">
  <!-- Middle container for lyrics -->
  <div style="box-shadow: -12px 12px 4px rgba(0, 0, 0, 0.5);" class="bg-yellow-200 dark:bg-yellow-200 border border-black mb-6 p-4 col-span-2 md:col-span-2 md:h-96 h-[25vh] order-1 md:order-2">
    <h2 class="text-lg font-bold mb-1 md:mb-2 text-black">Lyrics:</h2>
    <div id="text-container" class=" md:text-base text-xs"></div>
  </div>

  <!-- Left container for hints -->
  <div id="hint-container" style="box-shadow: -12px 12px 4px rgba(0, 0, 0, 0.5);" class="bg-yellow-200 dark:bg-yellow-200 border border-black mb-2  p-4 md:h-96 h-[15vh] md:col-span-1 order-2 md:order-1">
    <h2 class="text-lg font-bold mb-1 md:mb-2 text-black">Hints:</h2>
    <div id="hinttext-container" class=" md:text-base text-xs"></div>
  </div>

  <!-- Right container for guesses -->
  <div style="box-shadow: -12px 12px 4px rgba(0, 0, 0, 0.5);" id="guesses-container" class="bg-yellow-200 border border-black  dark:bg-yellow-200 p-4 md:h-96 h-[20vh] md:col-span-1 order-3">
    <h2 class="text-lg font-bold mb-1 md:mb-2 text-black">Made Guesses:</h2>
    <div id="guessestext-container" class=" md:text-base text-xs"></div>
  </div>
</div>
      </div>

      <!-- Input text field -->
      <div class="container md:w-full sm:w-1 md:my-20 mb-10 mt-4 mx-auto px-4 pb-4 flex justify-center">
        <div class="flex" style="flex-direction:column">
          <div class="flex">
            <input type="text" autocomplete="off" id="search-input" name="search" class="w-full max-w-md px-4 py-2 border border-black focus:outline-none focus:border-black bg-white" placeholder="Enter your guess" value="<?php echo htmlspecialchars($_POST['search'] ?? ''); ?>">
            <button id="send-button" class="bg-yellow-200 text-black px-4 py-2 rounded-r-md">Submit</button>
          </div>
          <div>
            <div id="search-results" class="bg-white w-full rounded-md shadow-lg border border-gray-300 hidden md:block"></div>
          </div>
          <div id="result"> </div>
        </div>
      </div>

      <div id="modal-background" class="fixed inset-0 bg-black bg-opacity-50 hidden"></div>
      <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
  <div class="bg-yellow-200 border-black border-2 rounded-lg p-8 max-w-xl">
    <h2 id="modalh2" class="text-2xl font-bold mb-4"></h2>
    <p id="modalmessage" class="mb-4">The correct answer was: <span id="modal-answer" class="font-bold"></span></p>
    <button id="modal-close" class="bg-gray-700 text-white px-4 py-2 rounded-md">Close</button>
    <button id="copy-text" class="bg-gray-700 text-white px-4 py-2 rounded-md mt-4">Copy Tries to Clipboard</button>
    <button id="play-next-round" class="bg-gray-700 text-white px-4 py-2 rounded-md mt-4">Play Next Round</button>
  </div>
</div>


    </main>

    <?php include "footer.php"; ?>


  <!-- scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" 
integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" 
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
  <script src="script.js"></script>
  <script id="gamelogic-script" src="randomquiz.js" data-tries="<?= $tries ?>"></script>
</body>

</html>