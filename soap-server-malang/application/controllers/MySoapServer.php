<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MySoapServer extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here

        $this->load->library("Nusoap_lib");

        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("MySoapServer", "urn:MySoapServer");
        $this->nusoap_server->register(
            "getData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#getData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "getDataId", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#getDataId", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "insertData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#insertData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "updateData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#updateData", "rpc", "encoded", "Echo test"
        );

        $this->nusoap_server->register(
            "deleteData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:MySoapServer", "urn:MySoapServer#deleteData", "rpc", "encoded", "Echo test"
        );

        /**
         * To test whether SOAP server/client is working properly
         * Just echos the input parameter
         * @param string $tmp anything as input parameter
         * @return string returns the input parameter
         */
        function getData($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','ekspedisi_malang');
            $query = "select * from ".$pars->table;
            $result = mysqli_query($conn,$query);
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            return json_encode($data);
        }

        function getDataId($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','ekspedisi_malang');
            $query = "select * from ".$pars->table." where id='".$pars->id."'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
                

            return json_encode($row);
        }

        function insertData($array) {
            $pars = json_decode($array);
            $data = $pars->data;
            $conn=mysqli_connect('localhost','root','','ekspedisi_malang');
            $column = "";
            foreach ($data as $key => $value) {
                $column .= $key.",";
            }
            $column = substr($column, 0,-1);

            $value = "";    
            foreach ($data as $key => $v) {
                $value .= "'".$v."',";
            }
            $value = substr($value, 0,-1);

            $query = "insert into ".$pars->table." (".$column.") values (".$value.")";
            $result = mysqli_query($conn,$query);
        }

        function updateData($array) {
            $pars = json_decode($array);
            $primary_key = $pars->primary_key;
            $id  = $pars->id;
            $data = $pars->data;
            $conn=mysqli_connect('localhost','root','','ekspedisi_malang');

            $set = "";
            foreach ($data as $key => $value) {
                $set .= $key."='".$value."',";
            }
            $set = substr($set,0,-1);

            $query = "update ".$pars->table." set ".$set." where ".$primary_key."='".$id."'";
            $result = mysqli_query($conn,$query);
        }
        function deleteData($array) {
            $pars = json_decode($array);
            $primary_key = $pars->primary_key;
            $id = $pars->id;
            $conn=mysqli_connect('localhost','root','','ekspedisi_malang');
            $query = "delete from ".$pars->table." where ".$primary_key."='".$id."'";
            $result = mysqli_query($conn,$query);
            return json_encode(array());
        }
    }

    function index() {
        $this->nusoap_server->service(file_get_contents("php://input")); //shows the standard info about service
    }
}