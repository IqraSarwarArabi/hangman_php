function handleCorrectGuess(inputLetter, wordLetters, correctGuessed) {
    $(`.${inputLetter}`).css("visibility", "visible");
    const count = wordLetters.filter(elem => elem === inputLetter).length;
    correctGuessed += count;
    console.log(correctGuessed)
    if (correctGuessed === wordLetters.length) {
        $('#game-won').modal('show');
        $(".won-close").on("click", function() {
            $('#game-won').modal('hide');
            location.reload();
        });
    }
    return correctGuessed;
}

function handleIncorrectGuess(incorrectAttempts) {
    if (incorrectAttempts === 6) {
        $('#game-lost').modal('show');
        $(".lost-close").on("click", function() {
            $('#game-lost').modal('hide');
            location.reload();
        });
    }
    incorrectAttempts++;
    $('.progress-bar').css('width', `${(incorrectAttempts / 6) * 100}%`);
    $('.bar-label').text(`${6 - incorrectAttempts} Incorrect attempts left`);
    return incorrectAttempts;
}

function playScreen(hint, wordLetters) {
    $("#game-section-wrapper").html(`
        <p>Hint: ${hint}</p>
        <div id="word-letters" class="word-letters"></div>
        <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-danger" style="width: 0%"></div>   
        </div>
        <p class="bar-label">6 Incorrect attempts left</p>
        <input type="text" id="guess-input" placeholder="Enter a letter">
        <p>Guessed Words: <span id="guessed-words"></span></p>    
    `);
    wordLetters.forEach(letter => {
        $('#word-letters').append(`<span><p class=${letter}>${letter}</p></span>`);
    });
}

function handleGuess(wordLetters){
    const guessedWords = [];
    let incorrectAttempts = 0;
    $correctGuessed = 0;
    $('#guess-input').on('input', function() {
        $(this).prop('disabled', true);
        const inputLetter = $(this).val().toLowerCase();
        if (inputLetter.length === 1 && guessedWords.indexOf(inputLetter) === -1) {
            guessedWords.push(inputLetter);
            $('#guessed-words').text(guessedWords.join(', '));
            if (wordLetters.includes(inputLetter)) {
                $correctGuessed = handleCorrectGuess(inputLetter, wordLetters, $correctGuessed);
            } 
            else {
                incorrectAttempts = handleIncorrectGuess(incorrectAttempts)
            }
        }
        setTimeout(() => {
            $(this).val('').prop('disabled', false).focus();
        }, 500);
    });
}

function startGame() {
    $("#start-button").click(function() {
        $("#game-section-wrapper").html(`<h2>Choose a theme</h2>`);
        $("#game-section-wrapper").append(`
            <div id="game-section" class="game-section-1">
                <div class="themes-div">
                    <button class="theme-button" data-theme="People">People</button>
                    <button class="theme-button" data-theme="Books">Books</button>
                    <button class="theme-button" data-theme="Movies">Movies</button>
                </div>
                <div class="themes-div">
                    <button class="theme-button" data-theme="Writers">Writers</button>
                    <button class="theme-button" data-theme="Countries">Countries</button>
                    <button class="theme-button" data-theme="Cities">Cities</button>
                </div>
            </div>
        `);
    });
}

$(document).ready(function() {
    startGame();

    $(document).on("click", ".theme-button", function() {
        const selectedTheme = $(this).data("theme");
        $.ajax({
            url: "../word_finder/includes/themes.php",
            type: "GET",
            data: { theme: selectedTheme }, 
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $word = response.word.toLowerCase();
                    const wordLetters = $word.split('');
                    playScreen(response.hint, wordLetters);    
                    handleGuess(wordLetters);
                }
            },
            error: function() {
                alert("An error occurred while fetching theme words.");
            }
        });
    });
});



