<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here

        $this->load->library("Nusoap_lib");

        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("Transaksi", "urn:Transaksi");

        $this->nusoap_server->register(
            "insertData", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#insertData", "rpc", "encoded", "Echo test"
        );

        /**
         * To test whether SOAP server/client is working properly
         * Just echos the input parameter
         * @param string $tmp anything as input parameter
         * @return string returns the input parameter
         */

        function insertData($array) {
            $pars = json_decode($array);
            $data = $pars->data;
            $conn=mysqli_connect('localhost','root','','ekspedisi_pusat');
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
    }

    function index() {
        $this->nusoap_server->service(file_get_contents("php://input")); //shows the standard info about service
    }
}