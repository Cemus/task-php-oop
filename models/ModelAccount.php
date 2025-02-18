<?php

class ModelAccount extends AbstractModel{
    private int $id;
    private array $account;
    private string $email;
    

/**
 * @method ajouter un compte en BDD
 * @param PDO $bdd
 * @param array $account [firstname, lastname, email, password]
 * @return void
 */
function add(): void {
    try{
        $requete = "INSERT INTO account(firstname, lastname, email, `password`)
        VALUE(?,?,?,?)";
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$this->account[0], PDO::PARAM_STR);
        $req->bindParam(2,$this->account[1], PDO::PARAM_STR);
        $req->bindParam(3,$this->account[2], PDO::PARAM_STR);
        $req->bindParam(4,$this->account[3], PDO::PARAM_STR);
        $req->execute();
    }
    catch(Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

/**
 * @method modifier un compte en BDD
 * @param PDO $bdd
 * @param array $account [firstname, lastname, ancien-email, nouvel-mail]
 * @return void
 */
function update(): void {
    try {
        $requete = "UPDATE account SET firstname=?, lastname=?, email=? 
        WHERE email=?";
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$this->account[0], PDO::PARAM_STR);
        $req->bindParam(2,$this->account[1], PDO::PARAM_STR);
        $req->bindParam(3,$this->account[3], PDO::PARAM_STR);
        $req->bindParam(4,$this->account[2], PDO::PARAM_STR);
        $req->execute();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

/**
 * @method Supprimer un compte en BDD
 * @param PDO $bdd
 * @param string $email
 * @return void
 */
function delete(): void {
    try{
        $requete = "DELETE FROM account WHERE email=?";
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$this->email, PDO::PARAM_STR);
        $req->execute();
    } catch(Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
/**
 * @method afficher un compte depuis son email
 * @param PDO $bdd
 * @param string $email
 * @return ?array acount [id, firstname, lastname, email]
 */
function getById(): array|null {
    try {
        $requete = "SELECT id_account, firstname, lastname, email FROM account
        WHERE id = ?";
        $bdd =  
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$this->getById(), PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

/**
 * @method afficher tous les comptes
 * @param PDO $bdd
 * @return ?array acount [id, firstname, lastname, email]
 */
function getAll(): array|null{
    try {
        $requete = "SELECT id_account, firstname, lastname, email FROM account";
        $req = $bdd->prepare($requete);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}



    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of account
     *
     * @return array
     */
    public function getAccount(): array {
        return $this->account;
    }

    /**
     * Set the value of account
     *
     * @param array $account
     *
     * @return self
     */
    public function setAccount(array $account): self {
        $this->account = $account;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }
}