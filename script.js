function toggleLogin() {
    const menu = document.getElementById("loginMenu");

    if (menu.classList.contains("show")) {
        menu.classList.remove("show");
    } else {
        menu.classList.add("show");
    }
}


window.addEventListener("click", function(event) {

    const button = document.querySelector(".login-dropdown button");
    const menu = document.getElementById("loginMenu");

    if (
        menu &&
        button &&
        !button.contains(event.target) &&
        !menu.contains(event.target)
    ) {
        menu.classList.remove("show");
    }
});



function filterDiamonds() {

    const clarity =
        document.getElementById("clarity").value;

    const color =
        document.getElementById("color").value;

    const cut =
        document.getElementById("cut").value;

    const shape =
        document.getElementById("shape").value;

    const carat =
        document.getElementById("carat").value;

    const price =
        document.getElementById("price").value;


    const diamonds =
        document.querySelectorAll(".diamond-card");


    let found = 0;


    diamonds.forEach(function(diamond) {

        const diamondClarity =
            diamond.dataset.clarity;

        const diamondColor =
            diamond.dataset.color;

        const diamondCut =
            diamond.dataset.cut;

        const diamondShape =
            diamond.dataset.shape;

        const diamondCarat =
            diamond.dataset.carat;

        const diamondPrice =
            Number(diamond.dataset.price);


        const clarityMatch =
            clarity === "all" ||
            clarity === diamondClarity;


        const colorMatch =
            color === "all" ||
            color === diamondColor;


        const cutMatch =
            cut === "all" ||
            cut === diamondCut;


        const shapeMatch =
            shape === "all" ||
            shape === diamondShape;


        const caratMatch =
            carat === "all" ||
            carat === diamondCarat;


        let priceMatch = true;


        if (price !== "all") {

            priceMatch =
                diamondPrice <= Number(price);

        }


        if (
            clarityMatch &&
            colorMatch &&
            cutMatch &&
            shapeMatch &&
            caratMatch &&
            priceMatch
        ) {

            diamond.style.display = "block";

            found++;

        } else {

            diamond.style.display = "none";

        }

    });


    let message =
        document.getElementById("noResults");


    if (!message) {

        message =
            document.createElement("p");

        message.id = "noResults";

        message.style.textAlign = "center";

        message.style.fontSize = "18px";

        message.style.marginTop = "30px";

        message.style.color = "#777";


        document
            .querySelector(".results-section")
            .appendChild(message);

    }


    if (found === 0) {

        message.textContent =
            "No diamonds found matching your selection.";

    } else {

        message.textContent = "";

    }

}
function checkDiamondAvailability() {

    const cards = document.querySelectorAll(".diamond-card");
    const message = document.getElementById("noDiamondMessage");

    let visibleCards = 0;

    cards.forEach(function(card) {

        if (card.style.display !== "none") {
            visibleCards++;
        }

    });

    if (visibleCards === 0) {
        message.style.display = "block";
    } else {
        message.style.display = "none";
    }
}
function goBack() {
    window.history.back();
}