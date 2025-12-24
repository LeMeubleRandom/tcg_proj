document.addEventListener("DOMContentLoaded", (event) => {
  console.log("charged");
  const classeur = document.querySelectorAll("div.card");
  classeur.forEach((card) => {
    card.addEventListener("animationiteration", (event) => {
      if (event.animationName === "fall") {
        let hasard = Math.random();
        hasard *= banqueImages.length;
        hasard = Math.floor(hasard);
        imgF = card.querySelector(".face");
        imgF.src = banqueImages[hasard];
      }
    });
  });
});
