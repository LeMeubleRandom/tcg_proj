document.addEventListener("DOMContentLoaded", (event) => {
  console.log("charged");
  const classeur = document.querySelectorAll("div.card");
  classeur.forEach((card) => {
    card.addEventListener("animationiteration", (event) => {
      if (event.animationName === "fall") {
        fetch("/../ressources/carddistrib.php")
          .then((response) => response.json())
          .then((data) => {
            card.querySelector(".face").src = data.face;
            card.querySelector(".back").src = data.back;
          });
      }
    });
  });
});
