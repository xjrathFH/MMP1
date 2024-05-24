// Studiengang: MultiMediaTechnology / FHS
// Zweck: MultiMediaProjekt 1
// Autor: Xaver Rath
document.addEventListener("DOMContentLoaded", function () {
  // Get elements
  
  const inputField = document.getElementById("search-input");
  const sendButton = document.getElementById("send-button");
  const textContainer = document.getElementById("text-container");
  const resultElement = document.getElementById("result");
  const guessesContainer = document.getElementById("guessestext-container");
  const copyButton = document.getElementById("copy-text");
  const gamelogicScript = document.getElementById("gamelogic-script");
  const tries = parseInt(gamelogicScript.getAttribute("data-tries"));

  let gameState = JSON.parse(localStorage.getItem("gameState"));
  let correctAnswer = "";
  let releaseDate = "";
  let artist = "";
  let album = "";

  copyButton.style.display = "none";

  if (!gameState) {
    gameState = {
      currentLineIndex: 1,
      remainingTries: tries,
      previousLines: [],
      guesses: [],
      lines: "",
      hints: [],
      gameEnded: false,
      gameWon: false,
      saveCorrectAnswer: "",
    };
  }

  if (textContainer && gameState.lines == "") {
    textContainer.innerHTML = gameState.lines;
    const xhr1 = new XMLHttpRequest();
    xhr1.open("POST", "verify-answer.php", true);
    xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr1.onreadystatechange = function () {
      if (xhr1.readyState === 4) {
        if (xhr1.status === 200) {
          const response1 = JSON.parse(xhr1.responseText);
          songid = response1.songid;
          console.log(songid);
        } else {
          console.error("AJAX request failed with status: " + xhr1.status);
        }

        let nextLine = JSON.parse(xhr1.responseText).nextLine;
        textContainer.innerHTML += "<p>" + nextLine + "</p>";
        gameState.lines += "<p>" + nextLine + "</p>";
      }
    };

    const data = "search=" + encodeURIComponent(0);
    const cLine = "&cLine=" + encodeURIComponent(0);
    xhr1.send(data + cLine);
  }

  if (gameState.lines != "") {
    textContainer.innerHTML = gameState.lines;
  }

  let {
    currentLineIndex,
    remainingTries,
    previousLines,
    guesses,
    hints,
    lines,
    gameEnded,
    gameWon,
    saveCorrectAnswer,
  } = gameState;
  let currentHintIndex = 0;

  let songid = 0;

  function displayHint() {
    const hintMessages = [
      { type: "releaseDate", message: `Release Date: ${releaseDate}` },
      { type: "artist", message: `Artist: ${artist}` },
      { type: "album", message: `Album: ${album}` },
    ];

    hints.push(hintMessages[currentHintIndex].message);
    const hintContainer = document.getElementById("hinttext-container");
    hintContainer.innerHTML = hints.join("<br>");
    currentHintIndex++;
  }

  function displayGuesses() {
    guessesContainer.innerHTML = "";
    for (const guess of guesses) {
      const guessElement = document.createElement("p");
      guessElement.textContent = guess;
      guessesContainer.appendChild(guessElement);
    }
  }

  function checkInput() {
    if (gameEnded) {
      return;
    }

    const userInput = inputField.value.trim().toLowerCase();

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "verify-answer.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          const guessText = response.correct
            ? `✓ ${userInput}`
            : `X ${userInput}`;

          guesses.push(guessText);
          displayGuesses();
          gameState.saveCorrectAnswer = response.correctAnswer;
          correctAnswer = response.correctAnswer;

          releaseDate = response.releaseDate;
          artist = response.artistName;
          album = response.albumName;

          if (response.correct) {
            correctAnswer = response.correctAnswer;
            gameState.gameWon = true;
            gameWon = true;
            resultElement.textContent = "Correct answer: " + correctAnswer;

            showModal();
            gameEnded = true;
          } else {
            releaseDate = response.releaseDate;
            artist = response.artistName;
            album = response.albumName;

            textContainer.innerHTML += "<p>" + response.nextLine + "</p>";
            gameState.lines += "<p>" + response.nextLine + "</p>";

            if (remainingTries === tries - 1) {
              currentHintIndex = 0;
              displayHint();
            } else if (remainingTries === tries - 2) {
              currentHintIndex = 1;
              displayHint();
            } else if (remainingTries === tries - 3) {
              currentHintIndex = 2;
              displayHint();
            }

            console.log(remainingTries);
            remainingTries--;
            resultElement.textContent = `Wrong answer! Tries left: ${remainingTries}`;
            if (remainingTries === 0) {
              showModal();

              resultElement.textContent = `You're out of tries. The correct answer was "${correctAnswer}".`;
              inputField.disabled = true;
              sendButton.disabled = true;
              gameEnded = true;
            } else {
              currentLineIndex++;
              // jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj
            }
          }

          lines = textContainer.innerHTML;

          gameState = {
            currentLineIndex,
            remainingTries,
            previousLines,
            guesses,
            hints,
            lines,
            gameEnded,
            gameWon,
            saveCorrectAnswer,
          };
          localStorage.setItem("gameState", JSON.stringify(gameState));
        } else {
          console.error("AJAX request failed.");
        }
      }
    };

    console.log(userInput);
    const data = "search=" + encodeURIComponent(userInput);
    const cLine = "&cLine=" + encodeURIComponent(currentLineIndex);
    xhr.send(data + cLine);
  }

  function showModal() {
    const modal = document.getElementById("modal");
    const modalback = document.getElementById("modal-background");
    const modalAnswer = document.getElementById("modal-answer");
    const modalh2 = document.getElementById("modalh2");
    const modalmessage = document.getElementById("modalmessage");
    if (gameState.gameWon) {
      copyButton.style.display = "inline";
    }
    modalAnswer.textContent = gameState.saveCorrectAnswer;

    modal.classList.remove("hidden");
    modalback.classList.remove("hidden");
    gameState.gameWon = gameWon;
    localStorage.setItem("gameState", JSON.stringify(gameState));

    if (gameWon) {
      modalh2.innerHTML += "GREAT JOB";
    } else {
      modalh2.innerHTML += "BETTER LUCK NEXT TIME";
    }

    localStorage.setItem("gameState", JSON.stringify(gameState));
  }

  const modalCloseButton = document.getElementById("modal-close");
  modalCloseButton.addEventListener("click", function () {
    const modal = document.getElementById("modal");
    const modalback = document.getElementById("modal-background");
    modal.classList.add("hidden");
    modalback.classList.add("hidden");
  });

  if (!gameState.gameWon) {
  } else if (gameState.gameWon || gameWon) {
  }
  copyButton.addEventListener("click", function () {
    const triesTaken = tries - Math.max(0, remainingTries - 1);
    const triesText = triesTaken === 1 ? "try" : "tries";
    const textToCopy = `I beat today's quiz in ${triesTaken} ${triesText}!`;

    const tempInput = document.createElement("textarea");
    tempInput.value = textToCopy;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    alert(`Copied to clipboard: ${textToCopy}`);
  });

  sendButton.addEventListener("click", checkInput);

  displayGuesses();
  const hintContainer = document.getElementById("hinttext-container");
  hintContainer.innerHTML = hints.join("<br>");

  if (gameEnded) {
    showModal();
  }

  $(document).ready(function () {
    $("#play-random-song").click(function () {
      // Clear localStorage
      localStorage.clear();
      gameState = {
        currentLineIndex: 1,
        remainingTries: tries,
        previousLines: [],
        guesses: [],
        hints: [],
        gameEnded: false,
      };

      const hintContainer = document.getElementById("hinttext-container");
      hintContainer.textContent = "";

      window.location.href = "changesong.php";
    });
  });
});
