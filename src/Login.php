<?php 


class Login {
    private $mysql;

    public function __construct(mysqli $mysql) {
        $this->mysql = $mysql; 
    }

    public function authenticate(string $user, string $password): bool {
        $queryPrepare = $this->mysql->prepare('SELECT `password`, `user` FROM `users` WHERE `user` = ?');
        $queryPrepare->bind_param('s', $user);
        $queryPrepare->execute();
        $user = $queryPrepare->get_result()->fetch_assoc();
        if (isset($user['password']) && $user['password'] == $password) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>