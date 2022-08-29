<?php

namespace App\Service;

use app\database\Connection;
use app\database\models\ModelLogin;
// use App\Modules\MercadoLivre\Model\IntegracaoMLModel;
// use App\Modules\MercadoLivre\Model\ModelLeads;
use Exception;

class LoginRepository
{

    // protected $conn;

    // public function __construct($connection = null)
    // {
    //     if(is_null($connection)){
    //         $this->conn = Connection::getConnection();
    //     } else {
    //         $this->conn = $connection;
    //     }

    //     $this->conn->query('SET names utf8');
    // }

    // public function updatePlan(Admin $model){
    //     try {

    //         $sql = "UPDATE integracao_api_mercadolivre_imobiliarias SET plano_ml_api = :dataPlan WHERE user_id_ml_api = :idMercadoLivre limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':idMercadoLivre',                  $model->getIdMercadoLivre(),       \PDO::PARAM_STR);
    //         $stmt->bindValue(':dataPlan',                        $model->getDataPlans(),              \PDO::PARAM_STR);

    //         return $stmt->execute();

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function updateIntegrationML(Admin $model){
    //     try {

    //         $sql = "UPDATE integracao_imoveis_api_mercado_livre_fila 
    //                     SET data_exec_fila_ml = :dateExecution, 
    //                     reposta_fila_ml = :response,
    //                     status_fila_ml = :statusQueue,
    //                     operacao_fila_ml = :typeOperation,
    //                     status_resposta_fila_ml = :statusResponse,
    //                     status_fila_ml = :statusQueue,
    //                     codigo_ml = :realtyMLID,
    //                     status_descricao_ml = :statusDescription
    //                 WHERE codigo_mercadolivre_fila = :id limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':dateExecution',                  $model->getProcessDate(),       \PDO::PARAM_STR);
    //         $stmt->bindValue(':response',                       $model->getResponse(),          \PDO::PARAM_STR);
    //         $stmt->bindValue(':typeOperation',                  $model->getTypeOperation(),     \PDO::PARAM_STR);
    //         $stmt->bindValue(':statusResponse',                 $model->getStatusResponse(),    \PDO::PARAM_STR);
    //         $stmt->bindValue(':statusQueue',                    $model->getStatusQueue(),       \PDO::PARAM_STR);
    //         $stmt->bindValue(':statusDescription',              $model->getStatusDescription(), \PDO::PARAM_STR);
    //         $stmt->bindValue(':realtyMLID',                     $model->getRealtyMLID(),        \PDO::PARAM_STR);
    //         $stmt->bindValue(':id',                             (int)$model->getId(),           \PDO::PARAM_INT);

    //         return $stmt->execute();

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function deleteML($id = 0){
    //     try {

    //         if($id === 0){
    //             return false;
    //         }

    //         $sql = "DELETE FROM 
    //                     integracao_imoveis_api_mercado_livre_fila 
    //                 WHERE codigo_mercadolivre_fila = :id limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':id',                             (int)$id,           \PDO::PARAM_INT);

    //         return $stmt->execute();

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function createAuth(Admin $model){
    //     try {

    //         if((int)$model->getId() > 0){
    //             $sql = "UPDATE integracao_api_mercadolivre_imobiliarias 
    //                     SET access_token_ml_api = :accessToken, token_type_ml_api = :typeToken, expires_in_ml_api = :expireML, scope_ml_api = :scopeML, plano_ml_api = :plan,
    //                     user_id_ml_api = :userMLID, refresh_token_ml_api = :refreshToken, status_ml_api = :statusML, message_ml_api = :messageML, error_ml_api = :errorML, data_update_ml_api = :dateUpdate 
    //                     WHERE codigo_ml_api = :id AND codigo_cad = :personID limit 1;";
    //         }else{
    //             $sql = "INSERT INTO integracao_api_mercadolivre_imobiliarias 
    //                     (codigo_cad, access_token_ml_api, token_type_ml_api, expires_in_ml_api, scope_ml_api, user_id_ml_api, refresh_token_ml_api, plano_ml_api, status_ml_api, message_ml_api, error_ml_api, data_update_ml_api) 
    //                 VALUES (:personID,:accessToken,:typeToken,:expireML,:scopeML,:userMLID,:refreshToken,:plan,:statusML,:messageML,:errorML,:dateUpdate);";
    //         }


    //         $stmt = $this->conn->prepare($sql);

    //         if((int)$model->getId() > 0){
    //             $stmt->bindValue(':id',                  (int)$model->getId(),              \PDO::PARAM_INT);
    //         }

    //         $stmt->bindValue(':personID',                (int)$model->getPersonID(),        \PDO::PARAM_INT);
    //         $stmt->bindValue(':accessToken',             $model->getAccessToken(),          \PDO::PARAM_STR);
    //         $stmt->bindValue(':typeToken',               $model->getTypeToken(),            \PDO::PARAM_STR);
    //         $stmt->bindValue(':expireML',                $model->getExpireML(),             \PDO::PARAM_STR);
    //         $stmt->bindValue(':scopeML',                 $model->getScopeML(),              \PDO::PARAM_STR);
    //         $stmt->bindValue(':userMLID',                $model->getUserMLID(),             \PDO::PARAM_STR);
    //         $stmt->bindValue(':refreshToken',            $model->getRefreshToken(),         \PDO::PARAM_STR);
    //         $stmt->bindValue(':statusML',                $model->getStatusML(),             \PDO::PARAM_STR);
    //         $stmt->bindValue(':messageML',               $model->getMessageML(),            \PDO::PARAM_STR);
    //         $stmt->bindValue(':errorML',                 $model->getErrorML(),              \PDO::PARAM_STR);
    //         $stmt->bindValue(':dateUpdate',              $model->getDateUpdate(),           \PDO::PARAM_STR);
    //         $stmt->bindValue(':plan',                    $model->getPlan(),                 \PDO::PARAM_STR);

    //         return $stmt->execute();

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function insertIntegrationML(Admin $model){
    //     try {
    //         $sql = "INSERT INTO integracao_imoveis_api_mercado_livre_fila 
    //                     (codigo_cad, codigo_imo, codigo_ml, status_fila_ml, operacao_fila_ml, reposta_fila_ml, status_resposta_fila_ml, data_insercao_fila_ml) 
    //                 VALUES (:personID,:realtyID,:realtyMLID,:statusQueue,:typeOperation,:response,:statusResponse,:insertDate);";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':personID',                  (int)$model->getPersonID(),       \PDO::PARAM_INT);
    //         $stmt->bindValue(':realtyID',                  (int)$model->getRealtyID(),       \PDO::PARAM_INT);
    //         $stmt->bindValue(':realtyMLID',                $model->getRealtyMLID(),          \PDO::PARAM_STR);
    //         $stmt->bindValue(':statusQueue',               $model->getStatusQueue(),         \PDO::PARAM_STR);
    //         $stmt->bindValue(':insertDate',                $model->getInsertDate(),          \PDO::PARAM_STR);
    //         $stmt->bindValue(':typeOperation',             $model->getTypeOperation(),       \PDO::PARAM_STR);
    //         $stmt->bindValue(':response',                  $model->getResponse(),            \PDO::PARAM_STR);
    //         $stmt->bindValue(':statusResponse',            $model->getStatusResponse(),      \PDO::PARAM_STR);

    //         return $stmt->execute();

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function insertMessageBox(ModelLeads $model){
    //     try {
    //         $sql = "INSERT INTO mod_caixa_msg 
    //                     (acao_caixa, origem_caixa, importante_caixa, tipo_caixa, codigo_cad, codigo_imo, data_envio_caixa, assunto_caixa, texto_caixa, msg_lida_caixa, contato_nome_caixa, contato_email_caixa) 
    //                 VALUES (:actionBox,:originBox,:isImportantBox,:typeBox,:personID,:realtyID,:sendDate,:subjectBox,:messageBox,:isReadMessage,:contactNameBox,:contactEmailBox);";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':actionBox',               $model->getActionBox(),            \PDO::PARAM_STR);
    //         $stmt->bindValue(':originBox',               $model->getOriginBox(),            \PDO::PARAM_STR);
    //         $stmt->bindValue(':isImportantBox',          $model->getIsImportantBox(),       \PDO::PARAM_STR);
    //         $stmt->bindValue(':typeBox',                 $model->getTypeBox(),              \PDO::PARAM_STR);
    //         $stmt->bindValue(':personID',                (int)$model->getPersonID(),        \PDO::PARAM_INT);
    //         $stmt->bindValue(':realtyID',                (int)$model->getRealtyID(),        \PDO::PARAM_INT);
    //         $stmt->bindValue(':sendDate',                $model->getSendDate(),             \PDO::PARAM_STR);
    //         $stmt->bindValue(':subjectBox',              $model->getSubject(),              \PDO::PARAM_STR);
    //         $stmt->bindValue(':messageBox',              $model->getMessage(),              \PDO::PARAM_STR);
    //         $stmt->bindValue(':isReadMessage',           $model->getMessageIsRead(),        \PDO::PARAM_STR);
    //         $stmt->bindValue(':contactNameBox',          $model->getContactNameBox(),       \PDO::PARAM_STR);
    //         $stmt->bindValue(':contactEmailBox',         $model->getContactEmailBox(),      \PDO::PARAM_STR);

    //         return $stmt->execute();

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // private static function host($url){
    //     return "https://api.mercadolibre.com/{$url}";
    // }

    // public static function auth($url,$data){

    //     $curl = curl_init();

    //     $url = self::host($url);

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "POST",
    //         CURLOPT_POSTFIELDS => json_encode($data)
    //     ));

    //     $data = curl_exec($curl);

    //     if (curl_errno($curl)) {
    //         return [];
    //     }

    //     $array = json_decode($data, true);

    //     curl_close($curl);

    //     return $array;
    // }
    // public static function send($url,$type,$data,$token){

    //     $curl = curl_init();

    //     $url = self::host($url);

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => $type,
    //         CURLOPT_POSTFIELDS => json_encode($data,JSON_UNESCAPED_UNICODE),
    //         CURLOPT_HTTPHEADER => array(
    //             "Authorization: Bearer {$token}",
    //             'Content-Type: application/json'
    //         ),
    //     ));

    //     $data = curl_exec($curl);

    //     if (curl_errno($curl)) {
    //         return [];
    //     }

    //     $array = json_decode($data, true);

    //     curl_close($curl);

    //     return $array;
    // }

    // public static function get($url,$token){

    //     $curl = curl_init();

    //     $url = self::host($url);

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => array(
    //             "Authorization: Bearer {$token}",
    //             'Content-Type: application/json'
    //         ),
    //     ));

    //     $data = curl_exec($curl);

    //     if (curl_errno($curl)) {
    //         return [];
    //     }

    //     $array = json_decode($data, true);

    //     curl_close($curl);

    //     return $array;
    // }

}