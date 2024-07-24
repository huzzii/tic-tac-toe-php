<?php
require_once 'TicTacToe.php';

session_start();

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new TicTacToe();
}

$game = $_SESSION['game'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = $_POST['row'];
    $col = $_POST['col'];
    $game->makeMove((int)$row, (int)$col);

    // Update scoreboard in cookies
    $result = $game->getGameResult();
    if ($result['winner'] === 'X' || $result['winner'] === 'O') {
        $winner = $result['winner'];
        if (isset($_COOKIE[$winner])) {
            setcookie($winner, $_COOKIE[$winner] + 1, time() + (86400 * 30)); // 30 days
        } else {
            setcookie($winner, 1, time() + (86400 * 30)); // 30 days
        }
    } elseif ($result['winner'] === 'Draw') {
        if (isset($_COOKIE['Draw'])) {
            setcookie('Draw', $_COOKIE['Draw'] + 1, time() + (86400 * 30)); // 30 days
        } else {
            setcookie('Draw', 1, time() + (86400 * 30)); // 30 days
        }
    }
}

$game->displayBoard();

$scoreX = isset($_COOKIE['X']) ? $_COOKIE['X'] : 0;
$scoreO = isset($_COOKIE['O']) ? $_COOKIE['O'] : 0;
$scoreDraw = isset($_COOKIE['Draw']) ? $_COOKIE['Draw'] : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tic Tac Toe</title>
</head>
<body>
    <form method="post" action="">
        <label for="row">Row (0, 1, or 2):</label>
        <input type="number" id="row" name="row" min="0" max="2" required>
        <br>
        <label for="col">Column (0, 1, or 2):</label>
        <input type="number" id="col" name="col" min="0" max="2" required>
        <br>
        <button type="submit">Make Move</button>
    </form>

    <p>Player <?php echo $game->getCurrentPlayer(); ?>'s turn</p>
    <?php
    if ($game->getWinner()) {
        echo "<p>Game over! Winner: {$game->getWinner()}</p>";
        session_destroy();
    }
    ?>

    <h3>Scoreboard</h3>
    <p>Player X wins: <?php echo $scoreX; ?></p>
    <p>Player O wins: <?php echo $scoreO; ?></p>
    <p>Draws: <?php echo $scoreDraw; ?></p>
</body>
</html>
