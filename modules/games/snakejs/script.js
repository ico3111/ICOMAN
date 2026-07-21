function game(time) {
  const gameDiv = document.getElementById("game");

  const WALL = "wall-cel";
  const APPLE = "apple-cel";
  const SNAKE = "snake-cel";
  const VOID = "void-cel";

  let map;
  let lastDirection = "w";
  let snakePosition = [{ y: 8, x: 1 }];
  let applePosition = { y: 5, x: 1 };

  const DIRECTIONS = {
    w: { y: -1, x: 0 },
    a: { y: 0, x: -1 },
    s: { y: 1, x: 0 },
    d: { y: 0, x: 1 },
  };

  function sortApple() {
    let y, x;
    do {
      y = Math.floor(Math.random() * 10);
      x = Math.floor(Math.random() * 10);
    } while (map[y][x] !== VOID);

    applePosition = { y, x };
  }

  function moveSnake() {
    const snakeHead = snakePosition[snakePosition.length - 1];
    const { y, x } = DIRECTIONS[lastDirection];
    const newHead = { y: snakeHead.y + y, x: snakeHead.x + x };

    const nextCell = map[newHead.y][newHead.x];

    if (nextCell === APPLE) {
      snakePosition.push(newHead);
      sortApple();
    } else {
      snakePosition.push(newHead);
      snakePosition.shift();
    }

    return nextCell === WALL || nextCell === SNAKE ? true : false;
  }

  function renderMap() {
    map = [
      [WALL, WALL, WALL, WALL, WALL, WALL, WALL, WALL, WALL, WALL],
      [WALL, VOID, VOID, VOID, VOID, VOID, VOID, VOID, VOID, WALL],
      [WALL, VOID, VOID, VOID, VOID, VOID, VOID, VOID, VOID, WALL],
      [WALL, VOID, VOID, VOID, VOID, VOID, VOID, VOID, VOID, WALL],
      [WALL, VOID, VOID, VOID, VOID, VOID, VOID, VOID, VOID, WALL],
      [WALL, VOID, VOID, VOID, VOID, VOID, VOID, VOID, VOID, WALL],
      [WALL, VOID, VOID, VOID, VOID, VOID, VOID, VOID, VOID, WALL],
      [WALL, VOID, VOID, VOID, VOID, VOID, VOID, VOID, VOID, WALL],
      [WALL, VOID, VOID, VOID, VOID, VOID, VOID, VOID, VOID, WALL],
      [WALL, WALL, WALL, WALL, WALL, WALL, WALL, WALL, WALL, WALL],
    ];

    snakePosition.forEach((snakeCell) => {
      map[snakeCell.y][snakeCell.x] = SNAKE;
    });

    map[applePosition.y][applePosition.x] = APPLE;
  }

  function showMap() {
    gameDiv.innerHTML = "";
    let h1 = document.createElement("h1");
    h1.innerText = snakePosition.length;
    gameDiv.appendChild(h1);
    let table = document.createElement("table");
    map.forEach((mapRow) => {
      let row = document.createElement("tr");
      mapRow.forEach((mapCol) => {
        let col = document.createElement("td");
        col.classList.add(mapCol);
        row.appendChild(col);
      });
      table.appendChild(row);
    });
    gameDiv.appendChild(table);
  }

  function showVirtualKeys() {
    const table = document.getElementById('tableVirtualKeys');
    table.innerHTML = `
        <tr><td></td><td><button type='button' class='virtualKey'>W</button></td><td></td></tr>
        <tr><td><button type='button' class='virtualKey'>A</button></td><td></td><td><button type='button' class='virtualKey'>D</button></td></tr>
        <tr><td></td><td><button type='button' class='virtualKey'>S</button></td><td></td></tr>
    `;
    document.body.appendChild(table);
  }
  showVirtualKeys();

  const virtualKeys = document.getElementsByClassName("virtualKey");

  Array.from(virtualKeys).forEach(button => {
    button.addEventListener("click", () => {
      const key = button.innerText.toLowerCase();
      lastDirection = key;
    });
  });

    const interval = setInterval(() => {
    renderMap();
    if (moveSnake()) {
        showMap();
        clearInterval(interval);
        alert("GAME OVER!");
        confirm("Try Again?") ? game(time) : location.reload();
    } else {
        showMap();
    }
    }, time);

  addEventListener("keydown", (key) => {
    ["w", "a", "s", "d"].forEach((allowed) => {
      if (key.key === allowed) {
        lastDirection = allowed;
      }
    });
  });
}

document.querySelectorAll(".btnStartGame").forEach((btn, index) => {
  btn.addEventListener("click", () => {
    switch (index) {
      case 0:
        game(1000);
        break;
      case 1:
        game(500);
        break;
      case 2:
        game(200);
        break;
    }
  });
});
