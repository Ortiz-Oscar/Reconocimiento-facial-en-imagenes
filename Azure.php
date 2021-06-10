<?php
class Computer_Vision{

    public function __construct(){
        $this->azure_facerecog="https://eastus.api.cognitive.microsoft.com/vision/v3.2/analyze?visualFeatures=Faces&language=en&model-version=latest";
        $this->subscription_key="7b89298d4ae74ee992210d545dab4a63";
    }
    public function recognizeURL($image_url){
        $data = array("url" => $image_url);
        $azure_url = $this->azure_facerecog;//Link para analizar la imagen
        $key=$this->subscription_key;
        $data_string = json_encode($data);
        $curl = curl_init($azure_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curl, CURLOPT_POST,           1 );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
      'Ocp-Apim-Subscription-Key:'.$key
        ));
        $response = curl_exec($curl);
        if(curl_error($curl)) {
            echo 'error:' . curl_error($curl);
        }
        else {
            $json_object = json_decode($response, true);
            echo json_encode($json_object); 
        }
        curl_close($curl);
        return "";
    }
}
?>