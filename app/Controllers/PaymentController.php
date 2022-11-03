<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaymentModel;

class PaymentController extends BaseController {

        protected $helpers = ['form', 'text', 'html', 'url', 'date'];

        public function index() {

            $fetchPayment = new PaymentModel();
            $data['Payment'] = $fetchPayment->findAll();


            // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('payment/payment_list', $data);
        }

        public function tablePayment() {
            $fetchPayment = new PaymentModel();
            $data['Payment'] = $fetchPayment->findAll();

            foreach($data['Payment'] as $value) {
                echo "<tr>
                <td> " . $value['id'] . " </td>
					<td> " . $value["p_id"] . " </td>
					<td> " . $value["b_id"] . " </td>
					<td> " . $value["first_name"] . " </td>
					<td> " . $value["last_name"] . " </td>
					<td> " . $value["amount"] . " </td>
					<td> " . $value["reference"] . " </td>
					<td> " . $value["pom"] . " </td>
					<td>
                <button data-edit_id='" . $value['id'] . "' id='Payment_edits'   data-toggle='modal' data-target='#Payment_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['id'] . "' id='Payment_deletes'  data-toggle='modal' data-target='#Payment_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
            }
        }

        public function apisPayment($id = null) {

            $fetchPayment = new PaymentModel();
            $data['Payment'] = $fetchPayment->where('id', $id)->findAll();

            foreach ($data['Payment'] as $value) {
                echo "<tr>
                <td> '" . $value['id'] . "' </td>
					<td> '" . $value["p_id"] . "' </td>
					<td> '" . $value["b_id"] . "' </td>
					<td> '" . $value["first_name"] . "' </td>
					<td> '" . $value["last_name"] . "' </td>
					<td> '" . $value["amount"] . "' </td>
					<td> '" . $value["reference"] . "' </td>
					<td> '" . $value["pom"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
            }
        }
                


        public function fetchPayment($id = null) {
            $fetchPayment = new PaymentModel();
            $data = $fetchPayment->find($id);
            echo json_encode($data);
        }

        public function fetchAPIsPayment($id = null) {
            $fetchPayment = new PaymentModel();
            $data = $fetchPayment->find($id);
            echo json_encode($data);
        }


        public function createPaymentView() {

            $fetchPayment = new PaymentModel();
            $data['Payment'] = $fetchPayment->findAll();

            // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('payment/payment_add', $data);
        }

        public function createPayment() {

            $insertPayment = new PaymentModel();

            // UNCOMMENT MO ITO KAPAG NEED MO MAG UPLOAD NG SINGLE FILE
            //if($img = $this->request->getFile('FILE_NAME_HERE')) {
                //if($img->isValid() && ! $img->hasMoved()) {
                    //$newName = $img->getRandomName();
                    //$img->move('uploads/', $newName);
                //}
            //}

            // UNCOMMENT MO ITO KAPAG NEED MO MAG UPLOAD NG SINGLE FILE GALING SA MODAL
            //if (is_uploaded_file($_FILES['COLUMN_NAME_DITO']['tmp_name'])) {
                //if ($file->isValid() && !$file->hasMoved()) {
                    //$imageName = $file->getRandomName();
                    //$file->move('uploads/', $imageName);
                //}
                //$data['COLUMN_NAME_DITO'] = $imageName;
            //}

            // UNCOMMENT MO ITO KAPAG NEED MO MAG UPLOAD NG MULTIPLE FILE
            //if($this->request->getFileMultiple('file')) {
                //foreach ($this->request->getFileMultiple('file') as $file) {
                    //$filename = $file->getRandomName();
                    //$file->move('uploads/', $filename);
                    //$data = array(
                        //'CHANGE_THIS_TO_UPLOAD_NAME' => $filename,
                        //'ADD_LAST_ID_HERE' => $filename,
                    //);
                    //$insertPayment->insert($data);
                //}
            //}



        	$data = array(
					'p_id' => $this->request->getPost('p_id'),
					'b_id' => $this->request->getPost('b_id'),
					'first_name' => $this->request->getPost('first_name'),
					'last_name' => $this->request->getPost('last_name'),
					'amount' => $this->request->getPost('amount'),
					'reference' => $this->request->getPost('reference'),
					'pom' => $this->request->getPost('pom'),
				);

            //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
            $insertPayment->insert($data);

            // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
            /*
            $response = $insertPayment->save($data);
            if($insertPayment) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

            return redirect()->to(base_url().'/payment')->with('success', 'Payment Created Successfully');
        }

        public function updatePayment($id = null) {

            $editsPayment = new PaymentModel();
            $dataPayment = $editsPayment->find($id);

            //if ($img = $this->request->getFile('FILE_NAME_HERE')) {
                //if ($img->isValid() && ! $img->hasMoved()) {
                    //$newName = $img->getRandomName();
                    //$img->move('uploads/', $newName);
                //}
            //}

            // uncomment ito kapag may file ka sa edit page
            //if(!empty($_FILES\['INPUTFILE_NAME_HERE']['name'])){
                //$db->query("UPDATE `TABLE_NAME` SET `THUMBNAIL_COLUMN_NAME` = 'INPUTFILE_NAME_HERE' WHERE id =".'$id);
           //}



            $data = array(
					'p_id' => $this->request->getPost('p_id'),
					'b_id' => $this->request->getPost('b_id'),
					'first_name' => $this->request->getPost('first_name'),
					'last_name' => $this->request->getPost('last_name'),
					'amount' => $this->request->getPost('amount'),
					'reference' => $this->request->getPost('reference'),
					'pom' => $this->request->getPost('pom'),
				);

        $editsPayment->update($dataPayment, $data);

        //echo json_encode($data);

        return redirect()->to(base_url().'/payment')->with('success', 'Payment Updated Successfully');
        }

        public function editPaymentView($id = null) {

            $fetchPayment = new PaymentModel();
            $data['payment'] = $fetchPayment->find($id);

            // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD OR
            // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA EDIT MODAL VIEW
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('payment/payment_edit', $data);
        }


        public function deletePayment($id = null) {

            $deletesPayment = new PaymentModel();
            $deletesPayment->where('id', $id)->delete();


            // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
           /* if($deletesPayment) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

            // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
            return redirect()->to(base_url().'/payment')->with('success', 'Payment Deleted Successfully');
        }


    }

    