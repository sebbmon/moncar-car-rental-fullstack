<?php 

class Database {
    private mysqli $connection;

    public function __construct() {
        try {
            $this->connection = new mysqli('localhost', 'root', '', 'projektup');
        } catch (Exception $e) {
            throw new Error('Problem z połączeniem z bazą.');
        }
    }

public function getVisitorCount(): string {
    $result = $this->connection->query('SELECT count FROM counter WHERE id = 1');
    $row = $result->fetch_assoc();
    $visitorCount = $row['count'];
    return $visitorCount;
}

    public function incrementVisitorCount(): void {
        $this->connection->query('UPDATE counter SET count = count + 1 WHERE id = 1');
    }

    public function getHeroCar(): array {
        return $this->connection->query('SELECT * FROM cars WHERE hero = 1')->fetch_assoc();
    }

    public function getCars(): mysqli_result {
        return $this->connection->query('SELECT * FROM cars');
    }

    public function checkIfUserExists(string $login): bool {
        if(!$login) return false;
        $result = $this->connection->query('SELECT login FROM users WHERE login = "' . $login . '"');
        return boolval($result->num_rows);
    }

    public function createUser(string $login, string $password): bool {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->connection->query("INSERT INTO users (id, login, password) VALUES(NULL, '$login', '$hash')");
        return $result;
    }

    public function authorizeUser(string $login, string $password): bool {
        $user = $this->connection->query("SELECT id,password FROM users WHERE login = '$login'")->fetch_assoc();
        if (!$user['password']) return false;

        if (password_verify($password, $user['password'])) {
            return true;
        }

        return $user['id'];
    }

    public function getOpinions(): mysqli_result {
        return $this->connection->query('SELECT * FROM opinions');
    }

    public function addOpinion(int $userId, int $stars, string $opinion): void 
    {
        $this->connection->query("INSERT INTO opinions (id, user_id, stars, opinion) VALUES (NULL, $userId, '$stars', '$opinion')");
    }

    public function addMessage(string $email, string $message): void {
        $this->connection->query("INSERT INTO messages (id, email, message) VALUES (NULL, '$email', '$message')");
    }
}