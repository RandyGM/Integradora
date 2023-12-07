document.addEventListener("DOMContentLoaded", function () {
    const phrases = [
        "Hola mundo",
        "Programación es divertida",
        "JavaScript es poderoso",
        "Aprender es un viaje",
        "Desarrollo web",
        "Tilinazo 23 cuarenta",
    ];

    const randomPhraseElement = document.getElementById("random-phrase");
    const wordContainer = document.getElementById("word-container");
    const blankContainer = document.getElementById("blank-container");
    const checkButton = document.getElementById("check-button");

    let currentPhrase = "";

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    function getRandomPhrase() {
        shuffleArray(phrases); // Barajar las frases
        currentPhrase = phrases[0]; // Tomar la primera frase barajada
        randomPhraseElement.textContent = currentPhrase;
        createWordAndBlankBoxes();
    }

    function createWordAndBlankBoxes() {
        wordContainer.innerHTML = "";
        blankContainer.innerHTML = "";

        const words = currentPhrase.split(" ");
        shuffleArray(words); // Barajar las palabras

        words.forEach((word, index) => {
            const wordBox = createBox(word, index);
            const blankBox = createBox("".repeat(word.length), index);

            wordContainer.appendChild(wordBox);
            blankContainer.appendChild(blankBox);
        });

        // Añadir event listener para permitir el soltar en el contenedor de palabras en blanco
        blankContainer.addEventListener("drop", handleDrop);
        blankContainer.addEventListener("dragover", handleDragOver);
    }

    function createBox(text, index) {
        const box = document.createElement("div");
        box.classList.add("word-box");
        box.setAttribute("data-index", index);
        box.setAttribute("draggable", true);
        box.textContent = text;
        box.addEventListener("dragstart", handleDragStart);
        return box;
    }

    function handleDragStart(event) {
        event.dataTransfer.setData("text/plain", event.target.textContent);
        event.target.style.opacity = "0.4";
    }

    function handleDrop(event) {
        event.preventDefault();
        const draggedText = event.dataTransfer.getData("text/plain");
        const dropTarget = event.target;

        if (dropTarget.classList.contains("word-box")) {
            dropTarget.textContent = draggedText;
            event.target.style.opacity = "1";
        } else {
            resetDraggedBox(event);
        }
    }

    function handleDragOver(event) {
        event.preventDefault();

        // Obtener la posición del mouse en relación con el contenedor de palabras en blanco
        const mouseX = event.clientX;
        const mouseY = event.clientY;
        const blankRect = blankContainer.getBoundingClientRect();

        // Verificar si el mouse está dentro de la zona vacía
        if (
            mouseX >= blankRect.left &&
            mouseX <= blankRect.right &&
            mouseY >= blankRect.top &&
            mouseY <= blankRect.bottom
        ) {
            // El mouse está dentro de la zona vacía, permitir el drop
            event.dataTransfer.dropEffect = "move";
        } else {
            // El mouse está fuera de la zona vacía, evitar el drop y restablecer la opacidad
            resetDraggedBox(event);
            event.dataTransfer.dropEffect = "none";
        }
    }

    function resetDraggedBox(event) {
        const draggedText = event.dataTransfer.getData("text/plain");
        const allWordBoxes = document.querySelectorAll(".word-box");
        const draggedBox = Array.from(allWordBoxes).find(box => box.textContent === draggedText);

        if (draggedBox) {
            draggedBox.style.opacity = "1";
            event.target.style.opacity = "1";
        }
    }

    function checkAnswer() {
        const userAnswer = Array.from(blankContainer.children).map(box => box.textContent).join(" ");
        if (userAnswer === currentPhrase) {
            alert("¡Correcto! La frase es: " + currentPhrase);
            getRandomPhrase();
        } else {
            alert("Incorrecto. Intenta de nuevo.");
            createWordAndBlankBoxes(); // Restaurar las cajas a su posición original
        }
    }

    checkButton.addEventListener("click", checkAnswer);

    getRandomPhrase();
});