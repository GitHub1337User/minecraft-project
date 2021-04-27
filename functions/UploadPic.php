<?php
session_start();
    class UploadPic{

        private $uploaddir = '/uploads/';
        public function __construct(){
//            $this->uploaddir=$this->uploaddir;
        }


        public function upload($inputName){

            $validation = $this->validation($inputName);
//            $path = $_SERVER['DOCUMENT_ROOT'].$this->uploaddir . time() . $inputName['name'];
            $name =  rand(0,100).time(). rand(0,100) . $inputName['name'];
            $path = $_SERVER['DOCUMENT_ROOT'].$this->uploaddir.$name;
//            var_dump($path);


            if ($validation) {
                move_uploaded_file($inputName['tmp_name'], $path);
            } else {
                $_SERVER['upload_status']="Возникла ошибка при загрузке файла";
            }
            return $name;


        }

        public function validation($inputName){

            $types = array('image/jpg', 'image/png', 'image/jpeg');
            $size = 7340032;


            if (!in_array($inputName['type'], $types)){
                $_SESSION['upload_status']="Запрещенный тип файлов";
                return false;
            }
            else if ($inputName['size'] > $size){
                $_SESSION['upload_status']="Размер превышает допустимый";
                return false;
            }
            return true;

        }
    }
