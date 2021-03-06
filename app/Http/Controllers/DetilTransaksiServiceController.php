<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detil_TransaksiService;
use App\JasaService;
use App\TransaksiPenjualan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\DetilTransaksiServiceTransformer;


class DetilTransaksiServiceController extends RestController
{
    //
    protected $transformer = DetilTransaksiServiceTransformer::class;

    ////menampilkan data
    public function show(){
        $detilJasa = Detil_TransaksiService::all();
        $response = $this->generateCollection($detilJasa);
        return $this->sendResponse($response);
    }

    //tampil by id
    public function showById(request $request, $id_detilTransaksiService){
        $detilJasa = Detil_TransaksiService::find($id_detilTransaksiService);
        $response = $this->generateItem($detilJasa);
        return $this->sendResponse($response);
    }
    //nambah data
    public function create(request $request){
        
        $datas = array();
        $datas = json_decode($request->data);
        $test = Detil_TransaksiService::where('id_detilTransaksiService', $datas[0]->id_detilTransaksiService)->delete();
        $subtotal = 0;
        try{
            foreach($datas as $data){
                $detilJasa = new Detil_TransaksiService();
                $detilJasa->id_transaksi_fk = $data->id_transaksi_fk;
                $detilJasa->id_jasaService_fk = $data->id_jasaService_fk;
                $detilJasa->id_motorKonsumen_fk = $data->id_motorKonsumen_fk;
                $detilJasa->status_service = "Belum Selesai";

                $service = JasaService::find($data->id_jasaService_fk);
                $detilJasa->subTotal_service = $service->harga_jasaService;
                $detilJasa->save();
                $subtotal += $detilJasa->subTotal_service;
                $response = $this->generateItem($detilJasa);

                return $this->sendResponse($response,201);
            }
            $penjualan = TransaksiPenjualan::find($datas[0]->id_detilTransaksiService);
            $penjualan->total_transaksi = 0 + $subtotal;
            $penjualan->save();
            $response = $this->generateItem($penjualan);
            return $this->sendResponse($response,201);
        }catch(\Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }
    //update data masih tcp 3
    public function update(request $request, $id_detilTransaksiService){
        $kode_sparepart_fk = $request->kode_sparepart_fk;
        $merk_motor = $request->merk_motor;
        $tipe_motor = $request->tipe_motor;

        try{
            $motor = Motor::find($id_motor);
            $motor->kode_sparepart_fk = $kode_sparepart_fk;
            $motor->merk_motor = $merk_motor;
            $motor->tipe_motor = $tipe_motor;
            
            $motor->save();

            $response = $this->generateItem($motor);

            return $this->sendResponse($response,201);
        }catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('motor_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    //hapus data
    public function delete($id_detilTransaksiService){
        try{
        $detilJasa = Detil_TransaksiService::find($id_detilTransaksiService);
        $detilJasa->delete();

            return response()->json('Successs', 201);
        }catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('detilJasa_tidak_ditemukan');
        }catch(\Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
