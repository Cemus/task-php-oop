<?php

class AccountMController extends AbstractController{
    private ViewAccount $viewAccount;
    private ModelAccount $modelAccount;

    public function signUp():string{

    }

    public function displayAccounts():array{
    }

    public function signIn():string{
    }

    public function displayForm(string $message, string $messageSignIn):string{

    }
    public function render():void{
        
    }

    /**
     * Get the value of viewAccount
     *
     * @return ViewAccount
     */
    public function getViewAccount(): ViewAccount {
        return $this->viewAccount;
    }

    /**
     * Set the value of viewAccount
     *
     * @param ViewAccount $viewAccount
     *
     * @return self
     */
    public function setViewAccount(ViewAccount $viewAccount): self {
        $this->viewAccount = $viewAccount;
        return $this;
    }

    /**
     * Get the value of modelAccount
     *
     * @return ModelAccount
     */
    public function getModelAccount(): ModelAccount {
        return $this->modelAccount;
    }

    /**
     * Set the value of modelAccount
     *
     * @param ModelAccount $modelAccount
     *
     * @return self
     */
    public function setModelAccount(ModelAccount $modelAccount): self {
        $this->modelAccount = $modelAccount;
        return $this;
    }
}