<?php

namespace app\Repository;

use app\database\Connection;
use Exception;

class LoginRepository
{

    protected $conn;

    public function __construct($connection = null)
    {
        if(is_null($connection)){
            $this->conn = Connection::getConnection();
        } else {
            $this->conn = $connection;
        }

        // $this->conn->query('SET names utf8');
    }

    public function teste(){
        // return array("name" => "teste", "passwrd" => "passwrd");
        return 'Testando';
    }
    public function verifyUser($email = NULL){

        try {

            if (empty($email)){ return [];}

            $sql = "SELECT id, name, email, passwrd FROM login WHERE email = :email limit 1";            

            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(':email', $email, \PDO::PARAM_STR);

            $stmt->execute();

            if($stmt->rowCount() === 0) {
                return [];
            }

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        }
        catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
    
    // public function verifyUserIntegration($id = 0){

    //     try {

    //         if (empty($id)){ return [];}

    //         $sql = "SELECT 
    //                     codigo_ml_api AS id,
    //                     codigo_cad AS personId,
    //                     access_token_ml_api AS accessToken,
    //                     token_type_ml_api AS typeToken,
    //                     expires_in_ml_api AS expireML,
    //                     scope_ml_api AS scopeML,
    //                     user_id_ml_api AS userMLID,
    //                     refresh_token_ml_api AS refreshToken,
    //                     plano_ml_api AS plan,
    //                     status_ml_api AS statusML,
    //                     message_ml_api AS messageML,
    //                     error_ml_api AS errorML,
    //                     data_update_ml_api AS dateUpdate
    //                 FROM
    //                     integracao_api_mercadolivre_imobiliarias WHERE codigo_cad = :id limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetch(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }
    // /**
    //  * verifyMl
    //  * FUNÇÃO VALIDA SE EXISTE O ACCESS TOKEN E O ID DO MERCADO LIVRE
    //  * @param $data
    //  * @param $type
    //  * @return array|mixed
    //  * @throws Exception
    //  */
    // public function verifyMl($data = null,$type = null){

    //     try {

    //         if (empty($data)){ return [];}

    //         $sql = "";

    //         if($type === "USER"){
    //             $sql = "SELECT codigo_ml_api as id,access_token_ml_api as accessToken FROM integracao_api_mercadolivre_imobiliarias WHERE user_id_ml_api = :data limit 1;";
    //         }

    //         if($type === "TOKEN"){
    //             $sql = "SELECT codigo_ml_api as id,access_token_ml_api as accessToken FROM integracao_api_mercadolivre_imobiliarias WHERE access_token_ml_api = :data limit 1;";
    //         }

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':data', $data, \PDO::PARAM_STR);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetch(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function verifyToMessageBox($sellerID,$codeML = null){

    //     try {

    //         if (empty($sellerID)){ return [];}

    //         $criterio = '';

    //         if(!empty($codeML)){
    //             $criterio = " AND imlf.codigo_ml = :codeML";
    //         }
    //         $sql = "SELECT 
    //                     imi.access_token_ml_api AS accessToken,
    //                     imi.codigo_cad AS personID,
    //                     imlf.codigo_imo AS realtyID
    //                 FROM
    //                     integracao_api_mercadolivre_imobiliarias AS imi
    //                         JOIN
    //                     integracao_imoveis_api_mercado_livre_fila AS imlf ON (imi.codigo_cad = imlf.codigo_cad)
    //                 WHERE
    //                     imi.user_id_ml_api = :sellerID
    //                         {$criterio} limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':sellerID', $sellerID, \PDO::PARAM_STR);

    //         if(!empty($codeML)){
    //             $stmt->bindValue(':codeML', $codeML, \PDO::PARAM_STR);
    //         }

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetch(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function verifyRealtyID($id = 0){

    //     try {

    //         if (empty($id)){ return [];}

    //         $sql = "SELECT 
    //                     codigo_cad
    //                 FROM
    //                     imovel
    //                 WHERE
    //                     codigo_imo = :realtyID limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':realtyID', (int)$id, \PDO::PARAM_INT);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetch(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // /**
    //  * retorna as informações de um imovel específico pelo ID
    //  * @param $id
    //  * @return array|mixed
    //  * @throws Exception
    //  */
    // public function informationRealty($id = 0){

    //     try {

    //         if (empty($id)){ return [];}

    //         $sql = "SELECT 
    //                     im.codigo_imo AS realtyID,
    //                     im.codigo_cad AS personID,
    //                     im.codigo_bai AS neighborhoodID,
    //                     bai.nome_bai AS neighborhood,
    //                     im.end_cidade_imo AS city,
    //                     im.end_estado_imo AS state,
    //                     im.end_logradouro_imo AS street,
    //                     im.tipo_imo AS realtyType,
    //                     im.finalidade_imo AS realtyFinality,
    //                     im.end_cep_imo AS zipCode,
    //                     im.end_numero_imo AS placeNumber,
    //                     im.areatotal_imo AS totalArea,
    //                     im.dormitorios_imo AS bedrooms,
    //                     im.banheiros_imo AS bathrooms,
    //                     im.garagem_imo AS parkingLot,
    //                     im.suites_imo AS suite,
    //                     im.areaterreno_imo AS totalArea2,
    //                     im.areaconstruida_imo AS builtArea,
    //                     im.areaprivativa_imo AS privateArea,
    //                     cad.nomefantasia_cad AS contactName,
    //                     cad.telefone01_cad AS contactPhone,
    //                     cad.email_cad AS contactEmail,
    //                     im.end_exibirsite_imo AS showAddress,
    //                     im.valor_iptu_imo AS iptu,
    //                     im.valor_condominio_imo AS condominium,
    //                     mobiliado_imo AS furnished,
    //                     acomodacoes_imo AS capacity,
    //                     im.portais_destaque_imo AS highLight,
    //                     im.portais_destaquesuper_imo AS superHighLight,
    //                     im.anoconstrucao_imo AS dateConstruction,
    //                     cad.website_cad AS website,
    //                     im.valor_esperado_imo AS price,
    //                     im.descricao_imo AS description1,
    //                     im.observacoes_imo AS description2,
    //                     im.pontosfortes_imo AS description3,
    //                     im.terrenofr_imo AS lotWidth,
    //                     im.terrenofu_imo AS lotDepth,
    //                     im.salas_imo AS rooms
    //                 FROM
    //                     imovel AS im
    //                         JOIN
    //                     cadastro AS cad ON (im.codigo_cad = cad.codigo_cad)
    //                         LEFT JOIN
    //                     bairro AS bai ON (bai.codigo_bai = im.codigo_bai)
    //                 WHERE
    //                     im.codigo_imo = :realtyID limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':realtyID', (int)$id, \PDO::PARAM_INT);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetch(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function featuresSpecificRealty($id = 0){

    //     try {

    //         if (empty($id)){ return [];}

    //         $sql = "SELECT 
    //                     icv.codigo_imo AS realtyID, ic.nome_icar AS description
    //                 FROM
    //                     imovel_caracteristicas AS ic
    //                         JOIN
    //                     imovel_caracteristicas_vinculo AS icv ON (ic.codigo_icar = icv.codigo_icar)
    //                 WHERE
    //                     icv.codigo_imo = :realtyID;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':realtyID', (int)$id, \PDO::PARAM_INT);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function updateRealtysWithUpdated(){
    //     try {

    //         $sql = "SELECT 
    //                     imlf.codigo_mercadolivre_fila AS id,
    //                     imlf.codigo_cad AS personID,
    //                     imlf.codigo_imo AS realtyID,
    //                     imlf.codigo_ml AS realtyIDMl,
    //                     imlf.status_fila_ml AS statusQueue,
    //                     imlf.operacao_fila_ml AS operationQueue,
    //                     imlf.reposta_fila_ml AS responseQueue,
    //                     imlf.status_resposta_fila_ml AS statusResponseQueue,
    //                     imlf.data_exec_fila_ml AS execData,
    //                     imlf.status_descricao_ml AS statusDescription,
    //                     im.exibir_imo AS publicateRealty,
    //                     im.portais_divulgar_imo AS isML
    //                 FROM
    //                     integracao_imoveis_api_mercado_livre_fila AS imlf
    //                         JOIN
    //                     imovel AS im ON (im.codigo_imo = imlf.codigo_imo)
    //                 WHERE
    //                     (imlf.data_exec_fila_ml IS NOT NULL
    //                         AND imlf.status_fila_ml = 'P'
    //                         AND imlf.data_exec_fila_ml < im.atualizadoem_imo)
    //                 ORDER BY imlf.codigo_mercadolivre_fila ASC
    //                 LIMIT 10;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // /**
    //  * retornar os imóveis (até 300) que não foram adicionados na tabela de integração de imovel do mercado livre
    //  * @return array|false
    //  * @throws Exception
    //  */
    // public function listNotExistsInTableIntegration(){

    //     try {

    //         $sql = "SELECT DISTINCT
    //                     (im.codigo_imo) AS realtyID, im.codigo_cad AS personID
    //                 FROM
    //                     imovel AS im
    //                 WHERE
    //                     im.portais_divulgar_imo LIKE '%P15#%'
    //                         AND im.codigo_imo NOT IN (SELECT 
    //                             codigo_imo
    //                         FROM
    //                             integracao_imoveis_api_mercado_livre_fila)
    //                 LIMIT 300;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // /**
    //  * retornar os imóveis (até 100) que não foram processados na tabela de integração de imovel do mercado livre
    //  * @return array|false
    //  * @throws Exception
    //  */
    // public function listNotProcessedIntegrationToMercadoLivre(){

    //     try {

    //         $sql = "SELECT 
    //                     codigo_mercadolivre_fila AS id,
    //                     codigo_cad AS personID,
    //                     codigo_imo AS realtyID,
    //                     codigo_ml AS realtyIDMl,
    //                     status_fila_ml AS statusQueue,
    //                     operacao_fila_ml AS operationQueue,
    //                     reposta_fila_ml AS responseQueue,
    //                     status_resposta_fila_ml AS statusResponseQueue,
    //                     data_insercao_fila_ml AS insertionDate,
    //                     data_exec_fila_ml AS execData,
    //                     status_descricao_ml AS statusDescription
    //                 FROM
    //                     integracao_imoveis_api_mercado_livre_fila
    //                 WHERE
    //                     (data_exec_fila_ml IS NULL
    //                         AND status_fila_ml = 'NP')
    //                         OR (status_fila_ml = 'P'
    //                         AND data_exec_fila_ml IS NOT NULL
    //                         AND codigo_ml IS NULL
    //                         AND TIMESTAMPDIFF(HOUR,
    //                         data_exec_fila_ml,
    //                         NOW()) > 1)
    //                 ORDER BY codigo_mercadolivre_fila ASC
    //                 LIMIT 50;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function listDeletedFromImobiToML(){

    //     try {

    //         $sql = "SELECT 
    //                     codigo_mercadolivre_fila as id,
    //                     codigo_cad as personID,
    //                     codigo_imo as realtyID,
    //                     codigo_ml as realtyIDMl,
    //                     status_fila_ml as statusQueue,
    //                     operacao_fila_ml as operationQueue,
    //                     reposta_fila_ml as responseQueue,
    //                     status_resposta_fila_ml as statusResponseQueue,
    //                     data_insercao_fila_ml as insertionDate,
    //                     data_exec_fila_ml as execData,
    //                     status_descricao_ml as statusDescription
    //                 FROM
    //                     integracao_imoveis_api_mercado_livre_fila AS imlf
    //                 WHERE
    //                     imlf.codigo_imo NOT IN (SELECT 
    //                             codigo_imo
    //                         FROM
    //                             imovel)
    //                 ORDER BY imlf.codigo_mercadolivre_fila
    //                 LIMIT 10;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function listCronUpdateAcesssToken(){

    //     try {

    //         $sql = "SELECT 
    //                     codigo_ml_api AS id,
    //                     codigo_cad AS personID,
    //                     access_token_ml_api AS accessToken,
    //                     token_type_ml_api AS typeToken,
    //                     expires_in_ml_api AS expireML,
    //                     scope_ml_api AS scopeML,
    //                     user_id_ml_api AS userMLID,
    //                     refresh_token_ml_api AS refreshToken,
    //                     plano_ml_api AS plan,
    //                     status_ml_api AS statusML,
    //                     message_ml_api AS messageML,
    //                     error_ml_api AS errorML,
    //                     data_update_ml_api AS dateUpdate
    //                 FROM
    //                     integracao_api_mercadolivre_imobiliarias
    //                 WHERE
    //                     TIMESTAMPDIFF(MINUTE,
    //                         data_update_ml_api,
    //                         NOW()) > 30
    //                 LIMIT 100;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // /**
    //  * retorna até 30 imagens (permitido no máximo 30 imagens no mercado livre) de um imóvel pelo seu ID
    //  * @param $id
    //  * @return array|false
    //  * @throws Exception
    //  */
    // public function getImagesRealty($id = 0){

    //     try {

    //         if (empty($id)){ return [];}

    //         $sql = "SELECT 
    //                     arquivo_imm AS image, destaque_imm, ordem_imm
    //                 FROM
    //                     imovel_imagem
    //                 WHERE
    //                     codigo_imo = :realtyID
    //                 ORDER BY destaque_imm = 'S' DESC , ordem_imm ASC
    //                 LIMIT 30;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':realtyID', (int)$id, \PDO::PARAM_INT);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function verifyIntegrationML($realtyID = 0){

    //     try {

    //         if (empty($realtyID)){ return [];}

    //         $sql = "SELECT 
    //                     codigo_mercadolivre_fila AS id, codigo_cad, codigo_imo, codigo_ml, status_fila_ml, data_exec_fila_ml, operacao_fila_ml, reposta_fila_ml, status_resposta_fila_ml
    //                 FROM
    //                     integracao_imoveis_api_mercado_livre_fila
    //                 WHERE
    //                     codigo_imo = :realtyID limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':realtyID', (int)$realtyID, \PDO::PARAM_INT);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetch(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // public function verififyTokenPerson($personID = 0){

    //     try {

    //         if (empty($personID)){ return [];}

    //         $sql = "SELECT 
    //                     codigo_cad AS personID, access_token_ml_api AS token
    //                 FROM
    //                     integracao_api_mercadolivre_imobiliarias
    //                 WHERE
    //                     codigo_cad = :personID limit 1;";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindValue(':personID', (int)$personID, \PDO::PARAM_INT);

    //         $stmt->execute();

    //         if($stmt->rowCount() === 0) {
    //             return [];
    //         }

    //         return $stmt->fetch(\PDO::FETCH_ASSOC);

    //     }
    //     catch (Exception $ex) {
    //         throw new Exception($ex->getMessage());
    //     }
    // }

    // /**
    //  * mlPlan
    //  * @param $params
    //  * @return array|mixed
    //  */
    // public static function mlPlan($params = array()){

    //     $curl = curl_init();

    //     $url =  "https://api.mercadolibre.com/users/{$params['userID']}/classifieds_promotion_packs?package_content=ALL&access_token={$params['token']}";

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //     ));

    //     $data = curl_exec($curl);

    //     if (curl_errno($curl)) {
    //         return [];
    //     }

    //     $array = json_decode($data, true);

    //     curl_close($curl);

    //     return $array;
    // }

    // public static function getAddress($route,$data){

    //     $curl = curl_init();

    //     $url = "https://api.mercadolibre.com/classified_locations/{$route}" . $data;


    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //     ));

    //     $data = curl_exec($curl);

    //     if (curl_errno($curl)) {
    //         return [];
    //     }

    //     $array = json_decode($data, true);

    //     curl_close($curl);

    //     return $array;
    // }

    // public static function get($url){

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
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //     ));

    //     $data = curl_exec($curl);

    //     if (curl_errno($curl)) {
    //         return [];
    //     }

    //     $array = json_decode($data, true);

    //     curl_close($curl);

    //     return $array;
    // }

    // private static function host($url){
    //     return "https://api.mercadolibre.com/{$url}";
    // }

}