<?php
// 建立一筆晚餐選項資料。
// name 是顯示名稱，tag 是分類，emoji 是預設圖示，image 可填自己的本機圖片路徑。
function food($name, $tag, $emoji, $imageQuery) {
    return [
        'name' => $name,
        'tag' => $tag,
        'emoji' => $emoji,
        'image' => '',
    ];
}

// 64 個晚餐選項資料。
// 之後想新增、刪除或替換食物，主要改這個陣列就可以。
$dinners = [
    food('牛肉麵', '熱湯系', '🍜', 'beef noodle soup'),
    food('滷肉飯', '台式經典', '🍚', 'braised pork rice'),
    food('雞肉飯', '台式經典', '🍗', 'chicken rice'),
    food('排骨便當', '便當系', '🍱', 'pork chop bento'),
    food('雞腿便當', '便當系', '🍱', 'chicken leg bento'),
    food('鹽酥雞', '宵夜系', '🍗', 'taiwanese fried chicken'),
    food('臭豆腐', '夜市系', '🥢', 'stinky tofu'),
    food('蚵仔煎', '夜市系', '🍳', 'oyster omelette'),
    food('水餃', '簡單飽', '🥟', 'dumplings'),
    food('鍋貼', '簡單飽', '🥟', 'potstickers'),
    food('炒飯', '快炒系', '🍛', 'fried rice'),
    food('炒麵', '快炒系', '🍝', 'fried noodles'),
    food('咖哩飯', '濃郁系', '🍛', 'curry rice'),
    food('日式豬排飯', '日式', '🍱', 'tonkatsu rice'),
    food('壽司', '日式', '🍣', 'sushi'),
    food('拉麵', '日式', '🍜', 'ramen'),
    food('烏龍麵', '日式', '🍜', 'udon noodles'),
    food('丼飯', '日式', '🍚', 'donburi rice bowl'),
    food('韓式拌飯', '韓式', '🥘', 'bibimbap'),
    food('韓式炸雞', '韓式', '🍗', 'korean fried chicken'),
    food('部隊鍋', '韓式', '🍲', 'budae jjigae'),
    food('泡菜鍋', '韓式', '🍲', 'kimchi stew'),
    food('石頭火鍋', '火鍋系', '🍲', 'hot pot'),
    food('麻辣鍋', '火鍋系', '🌶️', 'spicy hot pot'),
    food('涮涮鍋', '火鍋系', '🍲', 'shabu shabu'),
    food('羊肉爐', '暖身系', '🍲', 'lamb hot pot'),
    food('薑母鴨', '暖身系', '🦆', 'ginger duck soup'),
    food('燒肉', '聚餐系', '🥩', 'yakiniku'),
    food('牛排', '西式', '🥩', 'steak dinner'),
    food('義大利麵', '西式', '🍝', 'pasta'),
    food('披薩', '西式', '🍕', 'pizza'),
    food('漢堡', '西式', '🍔', 'burger'),
    food('炸雞', '速食', '🍗', 'fried chicken'),
    food('熱狗堡', '速食', '🌭', 'hot dog'),
    food('墨西哥捲餅', '異國', '🌯', 'burrito'),
    food('塔可', '異國', '🌮', 'taco'),
    food('越南河粉', '東南亞', '🍜', 'pho noodle soup'),
    food('打拋豬飯', '泰式', '🌶️', 'thai basil pork rice'),
    food('綠咖哩', '泰式', '🍛', 'green curry'),
    food('海南雞飯', '南洋', '🍚', 'hainanese chicken rice'),
    food('肉骨茶', '南洋', '🍲', 'bak kut teh'),
    food('沙威瑪', '街頭小吃', '🥙', 'shawarma'),
    food('烤鴨飯', '港式', '🍚', 'roast duck rice'),
    food('港式燒臘', '港式', '🍱', 'hong kong roast meat'),
    food('粥', '清爽系', '🥣', 'rice porridge'),
    food('湯麵', '熱湯系', '🍜', 'noodle soup'),
    food('乾麵', '麵食', '🍜', 'dry noodles'),
    food('米粉湯', '台式湯品', '🍜', 'rice noodle soup'),
    food('鴨肉飯', '台式經典', '🍚', 'duck rice'),
    food('虱目魚粥', '台南感', '🥣', 'milkfish porridge'),
    food('海鮮粥', '海味', '🦐', 'seafood porridge'),
    food('烤魚', '海味', '🐟', 'grilled fish'),
    food('生魚片丼', '日式', '🍣', 'sashimi rice bowl'),
    food('關東煮', '暖胃系', '🍢', 'oden'),
    food('鹽烤雞肉串', '居酒屋', '🍢', 'yakitori'),
    food('蔬食便當', '清爽系', '🥗', 'vegetarian bento'),
    food('沙拉碗', '清爽系', '🥗', 'salad bowl'),
    food('地瓜餐盒', '健康系', '🍠', 'sweet potato meal'),
    food('蛋包飯', '日式洋食', '🍳', 'omurice'),
    food('焗烤飯', '起司系', '🧀', 'baked rice cheese'),
    food('鐵板麵', '夜市系', '🍝', 'teppan noodles'),
    food('蔥油餅加蛋', '小吃系', '🥞', 'scallion pancake egg'),
    food('蘿蔔糕', '小吃系', '🥢', 'turnip cake'),
    food('麻醬麵', '麵食', '🍜', 'sesame noodles'),
];
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <!-- 基本網頁設定：字元編碼、手機版縮放、頁籤標題與 CSS 檔案。 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>今晚吃什麼？64 強晚餐二選一</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="game-shell">
        <!-- 頁首區：顯示遊戲名稱與簡短說明。 -->
        <section class="hero">
            <p class="eyebrow">Dinner Duel</p>
            <h1>今晚吃什麼？</h1>
            <p class="intro">從 64 個晚餐選項一路二選一，選到最後就是今晚的答案。</p>
        </section>

        <!-- 遊戲主區：包含目前回合、進度條、二選一卡片、結果與操作按鈕。 -->
        <section class="game-panel" aria-live="polite">
            <!-- 狀態列：由 app.js 即時更新目前是幾強，以及本輪第幾組。 -->
            <div class="status-bar">
                <div>
                    <span class="label">目前回合</span>
                    <strong id="roundLabel">64 強</strong>
                </div>
                <div>
                    <span class="label">本輪進度</span>
                    <strong id="matchLabel">第 1 組 / 32 組</strong>
                </div>
            </div>

            <!-- 進度條：由 app.js 依照本輪已完成的組數調整寬度。 -->
            <div class="progress-track" aria-hidden="true">
                <div id="progressFill" class="progress-fill"></div>
            </div>

            <!-- 二選一選項區：兩張卡片會被 app.js 填入食物圖片、名稱與分類。 -->
            <div id="choiceArea" class="choice-grid">
                <button class="choice-card" type="button" data-choice="0">
                    <span class="image-wrap">
                        <img class="food-image" alt="">
                        <span class="food-emoji"></span>
                    </span>
                    <span class="food-name"></span>
                    <span class="food-tag"></span>
                </button>
                <button class="choice-card" type="button" data-choice="1">
                    <span class="image-wrap">
                        <img class="food-image" alt="">
                        <span class="food-emoji"></span>
                    </span>
                    <span class="food-name"></span>
                    <span class="food-tag"></span>
                </button>
            </div>

            <!-- 冠軍結果區：一開始隱藏，最後只剩一個選項時由 app.js 顯示。 -->
            <div id="winnerArea" class="winner hidden">
                <span class="winner-image-wrap">
                    <img id="winnerImage" class="winner-image" alt="">
                    <span id="winnerEmoji" class="winner-emoji"></span>
                </span>
                <p class="label">今晚就決定是</p>
                <h2 id="winnerName"></h2>
                <p id="winnerTag"></p>
            </div>

            <!-- 操作按鈕：上一步會回到前一次選擇，重新開始會重新洗牌。 -->
            <div class="actions">
                <button id="undoButton" class="ghost-button" type="button">上一步</button>
                <button id="restartButton" class="primary-button" type="button">重新開始</button>
            </div>
        </section>
    </main>

    <script>
        // 把 PHP 陣列轉成 JavaScript 可以使用的資料。
        // app.js 會讀取 window.DINNER_OPTIONS 來產生每一輪的選項。
        window.DINNER_OPTIONS = <?php echo json_encode($dinners, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
    </script>
    <!-- 遊戲邏輯：洗牌、二選一、上一步、重新開始與畫面更新。 -->
    <script src="app.js"></script>
</body>
</html>
