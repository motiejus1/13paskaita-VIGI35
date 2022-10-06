

<?php

//sistemos vartotojai

//turime 5 puslapius

//pagrindinis - visi
//apie mus - visi
//kontaktai - svecias ir klientas
//galerija - svecias ir klientas
//vartotoju sarasas - administratorius


//accessFlagPagrindis - true - atitinkamas puslapis yra matomas atinkama vartotojui/ kitu ne
//accessFlagApieMus - 
//accessFlagKontaktai - 
//accessFlagGalerija- 
//accessFlagVartotojuSarasas - 

//interface nekuriu


//interface - negalime nurodyti savybiu

interface AccessFlags {
    public function accessFlagPagrindis();
    public function accessFlagApieMus();
    public function accessFlagKontaktai();
    public function accessFlagGalerija();
    public function accessFlagVartotojuSarasas();
} 

interface Roles extends AccessFlags {
    public function roleSvecias();
    public function roleKlientas();
    public function roleAdministratorius();
}



class A {
    public function accessFlagPagrindis() {
        return true;
    }
    public function accessFlagApieMus() {
        return true;
    }
    public function accessFlagKontaktai() {
        return false;
    }
    public function accessFlagGalerija() {
        return false;
    }
    public function accessFlagVartotojuSarasas() {
        return false;
    }
}

class Vartotojai {
    public $name;
    public $surname;
    public $age;
    public $id;
    public $email;
}

class Adminstratorius extends Vartotojai implements AccessFlag {
    // public $name;
    // public $surname;
    // public $age;
    // public $id;
    // public $email;
    public $role = 'admin';

    public function accessFlagPagrindis(){
        return true;
    }

    public function accessFlagApieMus(){
        return true;
    }

    public function accessFlagKontaktai(){
        return false;
    }

    public function accessFlagGalerija(){
        return true;
    }

    public function accessFlagVartotojuSarasas(){
        return true;
    }
    
}

class Moderatorius extends Vartotojai implements AccessFlags {
    // public $name;
    // public $surname;
    // public $age;
    // public $id;
    // public $email;
    public $role = 'moderator';

    public function accessFlagPagrindis(){
        return true;
    }

    public function accessFlagApieMus(){
        return true;
    }

    public function accessFlagKontaktai(){
        return false;
    }

    public function accessFlagGalerija(){
        return true;
    }

    public function accessFlagVartotojuSarasas(){
        return true;
    }
}

class Klientas extends Vartotojai implements AccessFlags{
    public $role = 'client';
    public function accessFlagPagrindis(){
        return true;
    }

    public function accessFlagApieMus(){
        return true;
    }

    public function accessFlagKontaktai(){
        return true;
    }

    public function accessFlagGalerija(){
        return true;
    }

    public function accessFlagVartotojuSarasas(){
        return true;
    }
}

class Svecias extends Vartotojai implements AccessFlags{
    public $role = 'guest';
    public function accessFlagPagrindis(){
        return true;
    }

    public function accessFlagApieMus(){
        return true;
    }

    public function accessFlagKontaktai(){
        return true;
    }

    public function accessFlagGalerija(){
        return true;
    }

    public function accessFlagVartotojuSarasas(){
        return true;
    }
}

//2019 ne manes


//2022 
class Pardavejas extends Vartotojai implements AccessFlags {
    public $role = 'seller';
    public function accessFlagPagrindis(){
        return true;
    }

    public function accessFlagApieMus(){
        return true;
    }

    public function accessFlagKontaktai(){
        return true;
    }

    public function accessFlagGalerija(){
        return true;
    }


    //AR toks kodas isvis veiks?
    //ar pardavejas VarotojuSarasas?

    public function accessFlagVartotojuSarasas(){
        return true;
     }
}


$pardavejas = new Pardavejas();
$administratorius = new Administatorius();



//Adminsitratorius
//Moderatorius
//Klientas
//Svecias
//Pardavejas