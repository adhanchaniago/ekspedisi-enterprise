<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here

        $this->load->library("Nusoap_lib");

        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("Transaksi", "urn:Transaksi");

        $this->nusoap_server->register(
            "getPengiriman", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#getPengiriman", "rpc", "encoded", "Echo test"
        );
        $this->nusoap_server->register(
            "pengirimanDetail", array("tmp" => "xsd:string"), array("return" => "xsd:string"), "urn:Transaksi", "urn:Transaksi#pengirimanDetail", "rpc", "encoded", "Echo test"
        );

        /**
         * To test whether SOAP server/client is working properly
         * Just echos the input parameter
         * @param string $tmp anything as input parameter
         * @return string returns the input parameter
         */

        function getPengiriman($array) {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','ekspedisi_pusat');
            $sql = "select pengiriman.*,(select kota from cabang where id=fk_cabang_ke) as kota_tujuan from ".$pars->table." where ".$pars->column_where."='".$pars->id_cabang."' AND status='".$pars->status."'";
            $result = mysqli_query($conn,$sql);
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return json_encode($data);
        }

        function pengirimanDetail($array)
        {
            $pars = json_decode($array);
            $conn=mysqli_connect('localhost','root','','ekspedisi_pusat');
            $sql = "select pengiriman_detail.*,(select resi from paket where id=fk_paket) as resi from pengiriman_detail where id='".$pars->id."'";
            $result = mysqli_query($conn,$sql);
                $data = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }
            return json_encode($data);
        }

        function updateStatus($array)
        {
            $pars = json_decode($array);
             $conn=mysqli_connect('localhost','root','','ekspedisi_pusat');
            $sql = "update pengiriman_detail set status='".$pars->status."'where id='".$pars->id."'";
            $result = mysqli_query($conn,$sql);
            return json_encode($result);
        }
    }

    function index() {
        $this->nusoap_server->service(file_get_contents("php://input"));
    }
}