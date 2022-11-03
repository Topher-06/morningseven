<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiscountModel;

class DiscountController extends BaseController {

        protected $helpers = ['form', 'text', 'html', 'url', 'date'];

        public function index() {

            $fetchDiscount = new DiscountModel();
            $data['Discount'] = $fetchDiscount->findAll();


            // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('discount/discount_list', $data);
        }

        public function tableDiscount() {
            $fetchDiscount = new DiscountModel();
            $data['Discount'] = $fetchDiscount->findAll();

            foreach($data['Discount'] as $value) {
                echo "<tr>
                <td> " . $value['id'] . " </td>
					<td> " . $value["d_id"] . " </td>
					<td> " . $value["Discount_Code"] . " </td>
					<td> " . $value["Discount_Amount"] . " </td>
					<td> " . $value["Date_From"] . " </td>
					<td> " . $value["Date_To"] . " </td>
					<td>
                <button data-edit_id='" . $value['id'] . "' id='Discount_edits'   data-toggle='modal' data-target='#Discount_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['id'] . "' id='Discount_deletes'  data-toggle='modal' data-target='#Discount_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
            }
        }

        public function apisDiscount($id = null) {

            $fetchDiscount = new DiscountModel();
            $data['Discount'] = $fetchDiscount->where('id', $id)->findAll();

            foreach ($data['Discount'] as $value) {
                echo "<tr>
                <td> '" . $value['id'] . "' </td>
					<td> '" . $value["d_id"] . "' </td>
					<td> '" . $value["Discount_Code"] . "' </td>
					<td> '" . $value["Discount_Amount"] . "' </td>
					<td> '" . $value["Date_From"] . "' </td>
					<td> '" . $value["Date_To"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
            }
        }
                


        public function fetchDiscount($id = null) {
            $fetchDiscount = new DiscountModel();
            $data = $fetchDiscount->find($id);
            echo json_encode($data);
        }

        public function fetchAPIsDiscount($id = null) {
            $fetchDiscount = new DiscountModel();
            $data = $fetchDiscount->find($id);
            echo json_encode($data);
        }


        public function createDiscountView() {

            $fetchDiscount = new DiscountModel();
            $data['Discount'] = $fetchDiscount->findAll();

            // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('discount/discount_add', $data);
        }

        public function createDiscount() {

            $insertDiscount = new DiscountModel();

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
                    //$insertDiscount->insert($data);
                //}
            //}



        	$data = array(
					'd_id' => $this->request->getPost('d_id'),
					'Discount_Code' => $this->request->getPost('Discount_Code'),
					'Discount_Amount' => $this->request->getPost('Discount_Amount'),
					'Date_From' => $this->request->getPost('Date_From'),
					'Date_To' => $this->request->getPost('Date_To'),
				);

            //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
            $insertDiscount->insert($data);

            // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
            /*
            $response = $insertDiscount->save($data);
            if($insertDiscount) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

            return redirect()->to(base_url().'/discount')->with('success', 'Discount Created Successfully');
        }

        public function updateDiscount($id = null) {

            $editsDiscount = new DiscountModel();
            $dataDiscount = $editsDiscount->find($id);

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
					'd_id' => $this->request->getPost('d_id'),
					'Discount_Code' => $this->request->getPost('Discount_Code'),
					'Discount_Amount' => $this->request->getPost('Discount_Amount'),
					'Date_From' => $this->request->getPost('Date_From'),
					'Date_To' => $this->request->getPost('Date_To'),
				);

        $editsDiscount->update($dataDiscount, $data);

        //echo json_encode($data);

        return redirect()->to(base_url().'/discount')->with('success', 'Discount Updated Successfully');
        }

        public function editDiscountView($id = null) {

            $fetchDiscount = new DiscountModel();
            $data['discount'] = $fetchDiscount->find($id);

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

            return view('discount/discount_edit', $data);
        }


        public function deleteDiscount($id = null) {

            $deletesDiscount = new DiscountModel();
            $deletesDiscount->where('id', $id)->delete();


            // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
           /* if($deletesDiscount) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

            // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
            return redirect()->to(base_url().'/discount')->with('success', 'Discount Deleted Successfully');
        }


    }

    