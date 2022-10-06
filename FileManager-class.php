<?php


//Paveldejimo poziuris
// FileManger - senelis, bendrai paimti ir nuskaityti duomenis is failo kaip teksta
//JsonManger - senelio sunus, bendrai paimti ir nuskaityti duomenis is failo kaip json
//CsvManger - anukas, bendrai paimti ir nuskaityti duomenis is failo kaip csv

//Polimorfizmas - atlieka ta pati tik kitaip

// FileManager - darbuotojas kuris atsakingas uz tekstinius failus
//JsonManger - darbuotojas kuris atsakingas uz json failus
//CsvManager - darbuotojas kuris atsakingas uz csv failus

//Interface - darbo tvarkos aprasas


interface FileManager {
    public function readFile();
    public function writeFile();
    public function showData();
}

class SimpleFileManager implements FileManager {
    public $file;
    public $data;

    public function __construct($file) {
        $this->file = $file;
    }

    public function readFile() {
        $this->data= file_get_contents($this->file); //teksta
    }

    public function writeFile($data) {
        file_put_contents($this->file, $data); 
    }

    public function showData() {
        echo $this->data;
    }

}


class JsonManager implements FileManager {
    public $file;
    public $data;

    public function __construct($file) {
        $this->file = $file;
    }
    
    public function readFile() {
        $this->data = json_decode(file_get_contents($this->file), true);
    }

    public function writeFile($data) {
        file_put_contents($this->file, json_encode($data));
    }

    public function showData() {
        foreach($this->data as $key=>$value) {
            if(is_array($value)) {
                foreach ($value as $value2) {
                    echo $value2 . " ";
                }     
            } else {
                echo "$key: $value <br>";
            }
        }
    }
}

class CsvManager implements FileManger {

    public $file;
    public $data;

    public function __construct($file) {
        $this->file = $file;
    }


    public function readFile() {
        $file = fopen($this->file, "r");// r - read veiksma

        //csv failo pavertimo i nuskaitoma masyva algoritmu
        while(($row=fgetcsv($file)) !== false) {
            
            $this->data[] = explode(";", $row[0]);
            // $this->data[$i] = $row;
            
        }

        $firstRow = $this->data[0];
        $suformuotasMasyvas = array();

        foreach ($firstRow as $name) {
            $suformuotasMasyvas[$name] = array();
        }

        foreach($this->data as $value) {
            foreach($value as $key=>$value2) {
                $suformuotasMasyvas[$firstRow[$key]][] = $value2;
            }
        }


        fclose($file);
    }
    public function writeFile($data) {
        //fopen -atidarome  file_get_contens ir fileputcontens
        //fclose uzdarome faila

        //filegetcsv
        //fileputcsv

        //skaityti faila po viena eilute
        //i faila irasyti tik po viena eilute
        $file = fopen($this->file, "w");//w irasymo veikmas
        foreach ($data as $row) {
            fputcsv($file, $row);
        }
    }

    public function showData() {
        foreach($this->data as $key=>$value) {
            if(is_array($value)) {
                foreach ($value as $value2) {
                    echo $value2 . " ";
                }     
            } else {
                echo "$key: $value <br>";
            }
        }
    }
    
}


class XMLFileManager implements FileManager {
    public $file;
    public $data;

    public function __construct($file) {
        $this->file = $file;
    }

    public function readFile(){
        return false;
    }

    public function writeFile(){
        return false;
    }
    public function showData(){
        return false;
    }
}

//json, XML faila, csv

