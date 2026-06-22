const options = window.DINNER_OPTIONS || [];

// 取得 HTML 裡需要被更新或被點擊的元素。
const roundLabel = document.querySelector("#roundLabel");
const matchLabel = document.querySelector("#matchLabel");
const progressFill = document.querySelector("#progressFill");
const choiceArea = document.querySelector("#choiceArea");
const choiceButtons = [...document.querySelectorAll(".choice-card")];
const winnerArea = document.querySelector("#winnerArea");
const winnerImage = document.querySelector("#winnerImage");
const winnerEmoji = document.querySelector("#winnerEmoji");
const winnerName = document.querySelector("#winnerName");
const winnerTag = document.querySelector("#winnerTag");
const undoButton = document.querySelector("#undoButton");
const restartButton = document.querySelector("#restartButton");

let state;
let history = [];

// Fisher-Yates 洗牌，讓每次開始的 64 強順序不同。
function shuffle(items) {
    const copy = [...items];
    for (let index = copy.length - 1; index > 0; index -= 1) {
        const randomIndex = Math.floor(Math.random() * (index + 1));
        [copy[index], copy[randomIndex]] = [copy[randomIndex], copy[index]];
    }
    return copy;
}

// 建立一場新遊戲需要的狀態。
function createState() {
    return {
        currentRound: shuffle(options),
        nextRound: [],
        matchIndex: 0,
        roundSize: options.length,
        winner: null,
    };
}

// 每次選擇前先存一份狀態，讓「上一步」可以回復。
function saveHistory() {
    history.push(JSON.parse(JSON.stringify(state)));
    undoButton.disabled = history.length === 0;
}

// 回到上一個選擇前的狀態。
function restorePrevious() {
    const previous = history.pop();
    if (!previous) {
        return;
    }

    state = previous;
    render();
}

// 玩家點選左邊或右邊時，把勝出的食物放進下一輪。
function selectWinner(choiceIndex) {
    saveHistory();

    const pair = getCurrentPair();
    state.nextRound.push(pair[choiceIndex]);
    state.matchIndex += 1;

    if (state.matchIndex >= state.currentRound.length / 2) {
        if (state.nextRound.length === 1) {
            state.winner = state.nextRound[0];
        } else {
            state.currentRound = state.nextRound;
            state.roundSize = state.currentRound.length;
            state.nextRound = [];
            state.matchIndex = 0;
        }
    }

    render();
}

// 依照目前第幾組，拿出正在對決的兩個食物。
function getCurrentPair() {
    const start = state.matchIndex * 2;
    return state.currentRound.slice(start, start + 2);
}

// 把剩餘數量轉成畫面上的回合名稱。
function roundName(size) {
    return size === 2 ? "決賽" : `${size} 強`;
}

// 設定食物圖片；如果圖片載入失敗，就改顯示 emoji。
function setFoodImage(image, emoji, food) {
    image.classList.remove("image-failed");
    image.alt = `${food.name}示意圖`;
    image.src = food.image;
    emoji.textContent = food.emoji;

    image.onerror = () => {
        image.classList.add("image-failed");
    };
}

// 把一個食物資料填入指定的選項卡。
function renderChoice(button, food) {
    const image = button.querySelector(".food-image");
    const emoji = button.querySelector(".food-emoji");

    setFoodImage(image, emoji, food);
    button.querySelector(".food-name").textContent = food.name;
    button.querySelector(".food-tag").textContent = food.tag;
}

// 顯示最後勝出的晚餐。
function renderWinner() {
    choiceArea.classList.add("hidden");
    winnerArea.classList.remove("hidden");

    setFoodImage(winnerImage, winnerEmoji, state.winner);
    winnerName.textContent = state.winner.name;
    winnerTag.textContent = state.winner.tag;
    roundLabel.textContent = "冠軍出爐";
    matchLabel.textContent = "完成";
    progressFill.style.width = "100%";
}

// 依照目前遊戲狀態更新整個畫面。
function render() {
    undoButton.disabled = history.length === 0;

    if (state.winner) {
        renderWinner();
        return;
    }

    const pair = getCurrentPair();
    const totalMatches = state.currentRound.length / 2;
    const completed = state.matchIndex;

    winnerArea.classList.add("hidden");
    choiceArea.classList.remove("hidden");
    roundLabel.textContent = roundName(state.roundSize);
    matchLabel.textContent = `第 ${state.matchIndex + 1} 組 / ${totalMatches} 組`;
    progressFill.style.width = `${Math.round((completed / totalMatches) * 100)}%`;

    choiceButtons.forEach((button, index) => renderChoice(button, pair[index]));
}

// 重新洗牌並開始新遊戲。
function restart() {
    state = createState();
    history = [];
    render();
}

// 兩張選項卡的點擊事件。
choiceButtons.forEach((button) => {
    button.addEventListener("click", () => {
        selectWinner(Number(button.dataset.choice));
    });
});

// 底部操作按鈕的點擊事件。
undoButton.addEventListener("click", restorePrevious);
restartButton.addEventListener("click", restart);

// 頁面載入後立即開始第一場遊戲。
restart();
