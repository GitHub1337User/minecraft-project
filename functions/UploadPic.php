<?php
session_start();
    class UploadPic{

        private $uploaddir = '/uploads/';
        public function __construct(){
//            $this->uploaddir=$this->uploaddir;
        }


        public function upload($inputName){

            $validation = $this->validation($inputName);
            $path = $_SERVER['DOCUMENT_ROOT'].$this->uploaddir . time() . $inputName['name'];

            if ($validation) {
                move_uploaded_file($inputName['tmp_name'], $path);
            } else {
                $_SERVER['upload_status']="Возникла ошибка при загрузке файла";
            }
            return $path;


        }

        public function validation($inputName){

            $types = array('image/jpg', 'image/png', 'image/jpeg');
            $size = 1024000;

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
