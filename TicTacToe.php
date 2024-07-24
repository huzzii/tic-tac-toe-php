<?php
class TicTacToe {
    private $board;
    private $currentPlayer;
    private $moves;
    private $winner;

    public function __construct() {
        $this->board = array_fill(0, 3, array_fill(0, 3, ' '));
        $this->currentPlayer = 'X';
        $this->moves = [];
        $this->winner = null;
    }

    public function displayBoard() {
        echo "<table border='1' cellpadding='10'>";
        for ($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 3; $j++) {
                echo "<td style='text-align: center;'>{$this->board[$i][$j]}</td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
    }

    public function makeMove($row, $col) {
        if ($this->winner) {
            echo "Game over! {$this->winner} has already won.<br>";
            return;
        }
        if ($row < 0 || $row > 2 || $col < 0 || $col > 2 || $this->board[$row][$col] !== ' ') {
            echo "Invalid move. Try again.<br>";
            return;
        }
        $this->board[$row][$col] = $this->currentPlayer;
        $this->moves[] = [$this->currentPlayer, $row, $col];
        if ($this->checkWinner()) {
            $this->winner = $this->currentPlayer;
            echo "Player {$this->currentPlayer} wins!<br>";
        } elseif (count($this->moves) === 9) {
            $this->winner = 'Draw';
            echo "The game is a draw.<br>";
        } else {
            $this->currentPlayer = $this->currentPlayer === 'X' ? 'O' : 'X';
        }
    }

    private function checkWinner() {
        $lines = [
            [$this->board[0][0], $this->board[0][1], $this->board[0][2]],
            [$this->board[1][0], $this->board[1][1], $this->board[1][2]],
            [$this->board[2][0], $this->board[2][1], $this->board[2][2]],
            [$this->board[0][0], $this->board[1][0], $this->board[2][0]],
            [$this->board[0][1], $this->board[1][1], $this->board[2][1]],
            [$this->board[0][2], $this->board[1][2], $this->board[2][2]],
            [$this->board[0][0], $this->board[1][1], $this->board[2][2]],
            [$this->board[0][2], $this->board[1][1], $this->board[2][0]],
        ];
        foreach ($lines as $line) {
            if ($line[0] !== ' ' && $line[0] === $line[1] && $line[1] === $line[2]) {
                return true;
            }
        }
        return false;
    }

    public function getGameResult() {
        return [
            'moves' => $this->moves,
            'winner' => $this->winner
        ];
    }

    public function getCurrentPlayer() {
        return $this->currentPlayer;
    }

    public function getBoard() {
        return $this->board;
    }

    public function getWinner() {
        return $this->winner;
    }

    public function setBoard($board) {
        $this->board = $board;
    }

    public function setMoves($moves) {
        $this->moves = $moves;
    }

    public function setCurrentPlayer($currentPlayer) {
        $this->currentPlayer = $currentPlayer;
    }

    public function setWinner($winner) {
        $this->winner = $winner;
    }
}
