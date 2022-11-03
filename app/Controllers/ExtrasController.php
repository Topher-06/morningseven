<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExtrasModel;

class ExtrasController extends BaseController {

        protected $helpers = ['form', 'text', 'html', 'url', 'date'];

        public function index() {

            $fetchExtras = new ExtrasModel();
            $data['Extras'] = $fetchExtras->findAll();


            // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('extras/extras_list', $data);
        }

        public function tableExtras() {
            $fetchExtras = new ExtrasModel();
            $data['Extras'] = $fetchExtras->findAll();

            foreach($data['Extras'] as $value) {
                echo "<tr>
                <td> " . $value['id'] . " </td>
					<td> " . $value["e_id"] . " </td>
					<td> " . $value["Items"] . " </td>
					<td> " . $value["Price"] . " </td>
					<td> " . $value["Quantity"] . " </td>
					<td> " . $value["Status"] . " </td>
					<td>
                <button data-edit_id='" . $value['id'] . "' id='Extras_edits'   data-toggle='modal' data-target='#Extras_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['id'] . "' id='Extras_deletes'  data-toggle='modal' data-target='#Extras_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
            }
        }

        public function apisExtras($id = null) {

            $fetchExtras = new ExtrasModel();
            $data['Extras'] = $fetchExtras->where('id', $id)->findAll();

            foreach ($data['Extras'] as $value) {
                echo "<tr>
                <td> '" . $value['id'] . "' </td>
					<td> '" . $value["e_id"] . "' </td>
					<td> '" . $value["Items"] . "' </td>
					<td> '" . $value["Price"] . "' </td>
					<td> '" . $value["Quantity"] . "' </td>
					<td> '" . $value["Status"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
            }
        }
                


        public function fetchExtras($id = null) {
            $fetchExtras = new ExtrasModel();
            $data = $fetchExtras->find($id);
            echo json_encode($data);
        }

        public function fetchAPIsExtras($id = null) {
            $fetchExtras = new ExtrasModel();
            $data = $fetchExtras->find($id);
            echo json_encode($data);
        }


        public function createExtrasView() {

            $fetchExtras = new ExtrasModel();
            $data['Extras'] = $fetchExtras->findAll();

            // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('extras/extras_add', $data);
        }

        public function createExtras() {

            $insertExtras = new ExtrasModel();

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
                    //$insertExtras->insert($data);
                //}
            //}



        	$data = array(
					'e_id' => $this->request->getPost('e_id'),
					'Items' => $this->request->getPost('Items'),
					'Price' => $this->request->getPost('Price'),
					'Quantity' => $this->request->getPost('Quantity'),
					'Status' => "Active",
				);

            //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
            $insertExtras->insert($data);

            // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
            /*
            $response = $insertExtras->save($data);
            if($insertExtras) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

            return redirect()->to(base_url().'/extras')->with('success', 'Extras Created Successfully');
        }

        public function updateExtras($id = null) {

            $editsExtras = new ExtrasModel();
            $dataExtras = $editsExtras->find($id);

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
					'e_id' => $this->request->getPost('e_id'),
					'Items' => $this->request->getPost('Items'),
					'Price' => $this->request->getPost('Price'),
					'Quantity' => $this->request->getPost('Quantity'),
					'Status' => $this->request->getPost('Status'),
				);

        $editsExtras->update($dataExtras, $data);

        //echo json_encode($data);

        return redirect()->to(base_url().'/extras')->with('success', 'Extras Updated Successfully');
        }

        public function editExtrasView($id = null) {

            $fetchExtras = new ExtrasModel();
            $data['extras'] = $fetchExtras->where('e_id',$id)->first();

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

            return view('extras/extras_edit', $data);
        }


        public function deleteExtras($id = null) {

            $deletesExtras = new ExtrasModel();
            $deletesExtras->where('e_id', $id)->delete();


            // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
           /* if($deletesExtras) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

            // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
            return redirect()->to(base_url().'/extras')->with('success', 'Extras Deleted Successfully');
        }


    }

    