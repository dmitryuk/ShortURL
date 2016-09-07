<?php
    namespace App\Base;
    
    
    class UrlClass
    {
        public static function generate($url){
            $q = App::$mysqli->prepare("insert into urls(`url`) VALUES (?)");
            $q->bind_param("s",$url);
            $q->execute();
            if($q->errno>0)
                return false;
            $id = $q->insert_id;
            $q->close();
            return self::idToShortURL($id);
        }

        public static function getUrlByShortURL($shortUrl){
            $id = self::shortURLtoID($shortUrl);
            if(!$id) return false;
            $q = App::$mysqli->prepare("select url from urls where id=?");
            $q->bind_param('i',$id);
            $q->execute();
            $q->bind_result($url);
            $q->fetch();
            return (isset($url)?$url:false);
        }
        
        private static function idToShortURL($id){
            $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $url = '';
            while($id>0){
                $url .= $charset[$id % 62];
                $id = (int) $id/62;
            }
            return strrev($url);
        }

        private function shortURLtoID($shortURL){
            $id = 0;
            for($i = 0;$i<strlen($shortURL); $i++){

                if ('a' <= $shortURL[$i] && $shortURL[$i] <= 'z')
                    $id = $id*62 + ord($shortURL[$i]) - ord('a');
                if ('A' <= $shortURL[$i] && $shortURL[$i] <= 'Z')
                    $id = $id*62 + ord($shortURL[$i]) - ord('A') + 26;
                if ('0' <= $shortURL[$i] && $shortURL[$i] <= '9')
                    $id = $id*62 + ord($shortURL[$i]) - ord('0') + 52;
            }
            return $id;
        }
    }
