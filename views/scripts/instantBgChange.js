document.getElementById("selectImage").addEventListener("change", function () {
  document.body.style.backgroundImage = `url(${this.value})`;
});

document.getElementById("selectTheme").addEventListener("change", function () {
  const theme = this.value;

  if (theme === "light") {
    document.body.style.backgroundColor = "white";
    document.body.style.color = "black";
  } else if (theme === "dark") {
    document.body.style.backgroundColor = "black";
    document.body.style.color = "white";
  }
});
