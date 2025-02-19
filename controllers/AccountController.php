<?php
class AccountController extends AbstractController {
    //METHOD
    public function displayForm(?string $message='',?string $messageSignIn=''):string{
        if(!isset($_SESSION['id'])){
            return '
            <section>
                <h1>Inscription</h1>
                <form action="" method="post">
                    <input type="text" name="lastname" placeholder="Le Nom de Famille">
                    <input type="text" name="firstname" placeholder="Le Prénom">
                    <input type="text" name="email" placeholder="L\'Email">
                    <input type="password" name="password" placeholder="Le Mot de Passe">
                    <input type="submit" name="submitSignUp">
                </form>
                <p>' . $message . '</p>
            </section>
            <section>
                <h1>Connexion</h1>
                <form action="" method="post">
                    <input type="text" name="emailSignIn" placeholder="L\'Email">
                    <input type="password" name="passwordSignIn" placeholder="Le Mot de Passe">
                    <input type="submit" name="submitSignIn">
                </form>
                <p>' . $messageSignIn . '</p>
            </section>';
        }
        return '';
    }

    public function displayAccount():string{
        //Récupération de la liste des utilisateurs
        //$data = getAllAccount($bdd);
        $accountModel = $this->getListModels()['account'];  
        $data = $accountModel->getAll(); 
        $listUsers = "";
        foreach($data as $account){
            $listUsers = $listUsers."<li><h2>".$account['firstname'] ." ". $account['lastname']."</h2>      <p>".$account['email']."</p></li>";
        }
        return $listUsers;
    }

    public function signUp(): string {
        if (isset($_POST['submitSignUp'])) {
            $firstname = $_POST['firstname'] ?? '';
            $lastname = $_POST['lastname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
    
            if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) {
                $accountData = [$firstname, $lastname, $email, password_hash($password, PASSWORD_BCRYPT)];
                $accountModel = $this->getListModels()['account'];
                $accountModel->setAccount($accountData);
                $accountModel->add(); 
    
                $message = "Inscription réussie !";
            } else {
                $message = "Tous les champs doivent être remplis.";
            }
    
            return $this->displayForm($message);
        }
        return "On a pas pu s'inscrire";
    }
    

    
    public function signin(): string {
        if (isset($_POST['submitSignIn'])) {
            $email = $_POST['emailSignIn'] ?? '';
            $password = $_POST['passwordSignIn'] ?? '';
    
            if (!empty($email) && !empty($password)) {
                $accountModel = $this->getListModels()['account'];
    
                $accountData = $accountModel->getByEmail($email);
  
                if ($accountData) {
                    if (password_verify($password, $accountData['password'])) {
                        $_SESSION['id'] = $accountData['id_account'];
                        $_SESSION['email'] = $accountData['email'];
    
                        return "YESSS";
                    } else {
                        $message = "Mot de passe incorrect..";
                    }
                } else {
                    $message = "Aucun compte trouvé.";
                }
            } else {
                $message = "Tous les champs doivent être remplis !";
            }
    
            return $this->displayForm('', $message);
        }
    
        return "Erreur de co";
    }
    

    
    public function render(): void {
        $this->signin();
        $this->signUp();

        $this->renderHeader();
        echo $this->displayForm();
        echo $this->displayAccount();
        $this->renderFooter();
    }
}