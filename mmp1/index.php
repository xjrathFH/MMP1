<!-- Studiengang: MultiMediaTechnology / FHS
Zweck: MultiMediaProjekt 1
Autor: Xaver Rath -->
<?php
$pagetitle = "Verse";
include "header.php";
?>

<main class="bg-yellow-200">
    <div class="logo-container flex justify-center items-center h-screen">
        <div class="flex flex-col items-center">
            <img src="textures/VERSE.svg" alt="Logo" class="logo-image">
            <p class="text-lg text-center ">Welcome to VERSE!</p>
            <p class="text-lg text-center mb-8">Try to guess the song only by its lyrics</p>
            <div class="flex justify-center">
            <a href="https://users.multimediatechnology.at/~fhs49049/mmp1/dailysong.php" class="mr-4 inline-block border text-xs md:text-xl border-black text-black px-4 py-2 rounded-xl hover:text-gray-500">song of the day</a>
                <a href="https://users.multimediatechnology.at/~fhs49049/mmp1/randomquiz.php" class="mr-4 inline-block border text-xs md:text-xl border-black text-black px-4 py-2 rounded-xl hover:text-gray-500">random song</a>
                <a href="https://users.multimediatechnology.at/~fhs49049/mmp1/impressum.php" id="open-modal" class=" inline-block border text-xs md:text-xl border-black text-black px-4 py-2 rounded-xl hover:text-gray-500">impressum</a>
            </div>
        </div>
    </div>
</main>

<?php
include "footer.php";
?>
