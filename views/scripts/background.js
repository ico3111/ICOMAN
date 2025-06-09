function applyBackgroundImage() {
  const selectedImage = document.getElementById("selectImage").value;
  if (selectedImage && selectedImage !== "none") {
    document.body.style.backgroundImage = `url(${selectedImage})`;
  } else {
    document.body.style.backgroundImage = "none";
  }
}

function applyTheme() {
  const theme = document.getElementById("selectTheme").value;
  if (theme === "light") {
    document.body.style.backgroundColor = "white";
    document.body.style.color = "black";
  } else if (theme === "dark") {
    document.body.style.backgroundColor = "black";
    document.body.style.color = "white";
  }
}

window.addEventListener("DOMContentLoaded", function () {
  applyBackgroundImage();
  applyTheme();
});

document
  .getElementById("selectImage")
  .addEventListener("change", applyBackgroundImage);
document.getElementById("selectTheme").addEventListener("change", applyTheme);
