<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GcashModel;

class GcashController extends BaseController {

        protected $helpers = ['form', 'text', 'html', 'url', 'date'];

        public function index() {

            $fetchGcash = new GcashModel();
            $data['Gcash'] = $fetchGcash->findAll();


            // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('gcash/gcash_list', $data);
        }

        public function tableGcash() {
            $fetchGcash = new GcashModel();
            $data['Gcash'] = $fetchGcash->findAll();

            foreach($data['Gcash'] as $value) {
                echo "<tr>
                <td> " . $value['id'] . " </td>
					<td> " . $value["g_id"] . " </td>
					<td> " . $value["number"] . " </td>
					<td> " . $value["first_name"] . " </td>
					<td> " . $value["last_name"] . " </td>
					<td>
                <button data-edit_id='" . $value['id'] . "' id='Gcash_edits'   data-toggle='modal' data-target='#Gcash_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['id'] . "' id='Gcash_deletes'  data-toggle='modal' data-target='#Gcash_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
            }
        }

        public function apisGcash($id = null) {

            $fetchGcash = new GcashModel();
            $data['Gcash'] = $fetchGcash->where('id', $id)->findAll();

            foreach ($data['Gcash'] as $value) {
                echo "<tr>
                <td> '" . $value['id'] . "' </td>
					<td> '" . $value["g_id"] . "' </td>
					<td> '" . $value["number"] . "' </td>
					<td> '" . $value["first_name"] . "' </td>
					<td> '" . $value["last_name"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
            }
        }
                


        public function fetchGcash($id = null) {
            $fetchGcash = new GcashModel();
            $data = $fetchGcash->find($id);
            echo json_encode($data);
        }

        public function fetchAPIsGcash($id = null) {
            $fetchGcash = new GcashModel();
            $data = $fetchGcash->find($id);
            echo json_encode($data);
        }


        public function createGcashView() {

            $fetchGcash = new GcashModel();
            $data['Gcash'] = $fetchGcash->findAll();

            // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('gcash/gcash_add', $data);
        }

        public function createGcash() {

            $insertGcash = new GcashModel();

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
                    //$insertGcash->insert($data);
                //}
            //}



        	$data = array(
					'g_id' => $this->request->getPost('g_id'),
					'number' => $this->request->getPost('number'),
					'first_name' => $this->request->getPost('first_name'),
					'last_name' => $this->request->getPost('last_name'),
				);

            //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
            $insertGcash->insert($data);

            // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
            /*
            $response = $insertGcash->save($data);
            if($insertGcash) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

            return redirect()->to(base_url().'/gcash')->with('success', 'Gcash Created Successfully');
        }

        public function updateGcash($id = null) {

            $editsGcash = new GcashModel();
            $dataGcash = $editsGcash->find($id);

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
					'g_id' => $this->request->getPost('g_id'),
					'number' => $this->request->getPost('number'),
					'first_name' => $this->request->getPost('first_name'),
					'last_name' => $this->request->getPost('last_name'),
				);

        $editsGcash->update($dataGcash, $data);

        //echo json_encode($data);

        return redirect()->to(base_url().'/gcash')->with('success', 'Gcash Updated Successfully');
        }

        public function editGcashView($id = null) {

            $fetchGcash = new GcashModel();
            $data['gcash'] = $fetchGcash->find($id);

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

            return view('gcash/gcash_edit', $data);
        }


        public function deleteGcash($id = null) {

            $deletesGcash = new GcashModel();
            $deletesGcash->where('g_id', $id)->delete();


            // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
           /* if($deletesGcash) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

            // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
            return redirect()->to(base_url().'/gcash')->with('success', 'Gcash Deleted Successfully');
        }


    }

    