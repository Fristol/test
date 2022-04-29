<?php

namespace Redis\Metods;
require_once './Backend/Database/redis.php';



class Metods extends \Exception
{
    public static function getAll($urlData, $urls)
    {
        //GET /api/redis
        header('Content-type: json/application');
        try {
            if (count($urls) > 2){
                throw new \Exception('Неправельное указание параметров');
            }
            $data = \Database::getAll();
            if (!empty($data)) {
                http_response_code(200);
                echo json_encode([
                    "status" => true,
                    "code" => 200,
                    "data" => $data]);
                return;
            }
            throw new \Exception('Пусто');
        } catch (\Exception $exception){
            http_response_code(500);
            echo json_encode([
                "status" => false,
                "code" => 500,
                "data" => ["message" => $exception->getMessage()],]);
        }

    }


    public static function delete($key, $urls)
    {
        //DELETE /api/redis/{key}
        header('Content-type: json/application');
        try {
            if (count($urls) > 3){
                throw new \Exception('Неправельное указание параметров');
            }
            if (array_key_exists($key, \Database::getAll())) {
                \Database::delete($key);
                http_response_code(200);
                echo json_encode([
                    "status" => true,
                    "code" => 200,
                    "data" => '']);
                return;
            }
            throw new \Exception('Нет такого ключа');
        } catch (\Exception $exception){
            http_response_code(500);
            echo json_encode([
                "status" => false,
                "code" => 500,
                "data" => ["message" => $exception->getMessage()],]);
        }


    }
}