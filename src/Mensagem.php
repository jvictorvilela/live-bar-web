<?php 


class Mensagem {
    private $mysql;

    public function __construct(mysqli $mysql) {
        $this->mysql = $mysql;
    }

    public function getTitle() {
        $result = $this->mysql->query('SELECT `title` FROM mensagem');
        $title = $result->fetch_array(MYSQLI_ASSOC)['title'];
        return $title;
    }

    public function getVerse() {
        $result = $this->mysql->query('SELECT `verse` FROM mensagem');
        $verse = $result->fetch_array(MYSQLI_ASSOC)['verse'];
        return $verse;
    }

    public function getName() {
        $result = $this->mysql->query('SELECT `name` FROM mensagem');
        $name = $result->fetch_array(MYSQLI_ASSOC)['name'];
        return $name;
    }

    public function update(string $newTitle, string $newVerse, string $newName): bool {
        $queryPrepare = $this->mysql->prepare('UPDATE mensagem SET title = ?, verse = ?, `name` = ?');
        $queryPrepare->bind_param('sss', $newTitle, $newVerse, $newName);
        $result = $queryPrepare->execute();

        if ($result == false) {
            return false;
        }
        return true;
    }

}

?>