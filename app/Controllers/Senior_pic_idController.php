<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Senior_pic_idModel;

class Senior_pic_idController extends BaseController {

        protected $helpers = ['form', 'text', 'html', 'url', 'date'];

        public function index() {

            $fetchSenior_pic_id = new Senior_pic_idModel();
            $data['Senior_pic_id'] = $fetchSenior_pic_id->findAll();


            // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('senior_pic_id/senior_pic_id_list', $data);
        }

        public function tableSenior_pic_id() {
            $fetchSenior_pic_id = new Senior_pic_idModel();
            $data['Senior_pic_id'] = $fetchSenior_pic_id->findAll();

            foreach($data['Senior_pic_id'] as $value) {
                echo "<tr>
                <td> " . $value['id'] . " </td>
					<td> " . $value["s_id"] . " </td>
					<td> " . $value["s_image"] . " </td>
					<td> " . $value["s_room_id"] . " </td>
					<td>
                <button data-edit_id='" . $value['id'] . "' id='Senior_pic_id_edits'   data-toggle='modal' data-target='#Senior_pic_id_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['id'] . "' id='Senior_pic_id_deletes'  data-toggle='modal' data-target='#Senior_pic_id_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
            }
        }

        public function apisSenior_pic_id($id = null) {

            $fetchSenior_pic_id = new Senior_pic_idModel();
            $data['Senior_pic_id'] = $fetchSenior_pic_id->where('id', $id)->findAll();

            foreach ($data['Senior_pic_id'] as $value) {
                echo "<tr>
                <td> '" . $value['id'] . "' </td>
					<td> '" . $value["s_id"] . "' </td>
					<td> '" . $value["s_image"] . "' </td>
					<td> '" . $value["s_room_id"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
            }
        }
                


        public function fetchSenior_pic_id($id = null) {
            $fetchSenior_pic_id = new Senior_pic_idModel();
            $data = $fetchSenior_pic_id->find($id);
            echo json_encode($data);
        }

        public function fetchAPIsSenior_pic_id($id = null) {
            $fetchSenior_pic_id = new Senior_pic_idModel();
            $data = $fetchSenior_pic_id->find($id);
            echo json_encode($data);
        }


        public function createSenior_pic_idView() {

            $fetchSenior_pic_id = new Senior_pic_idModel();
            $data['Senior_pic_id'] = $fetchSenior_pic_id->findAll();

            // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
            /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

            return view('senior_pic_id/senior_pic_id_add', $data);
        }

        public function createSenior_pic_id() {

            $insertSenior_pic_id = new Senior_pic_idModel();

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
                    //$insertSenior_pic_id->insert($data);
                //}
            //}



        	$data = array(
					's_id' => $this->request->getPost('s_id'),
					's_image' => $this->request->getPost('s_image'),
					's_room_id' => $this->request->getPost('s_room_id'),
				);

            //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
            $insertSenior_pic_id->insert($data);

            // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
            /*
            $response = $insertSenior_pic_id->save($data);
            if($insertSenior_pic_id) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

            return redirect()->to(base_url().'/senior_pic_id')->with('success', 'Senior_pic_id Created Successfully');
        }

        public function updateSenior_pic_id($id = null) {

            $editsSenior_pic_id = new Senior_pic_idModel();
            $dataSenior_pic_id = $editsSenior_pic_id->find($id);

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
					's_id' => $this->request->getPost('s_id'),
					's_image' => $this->request->getPost('s_image'),
					's_room_id' => $this->request->getPost('s_room_id'),
				);

        $editsSenior_pic_id->update($dataSenior_pic_id, $data);

        //echo json_encode($data);

        return redirect()->to(base_url().'/senior_pic_id')->with('success', 'Senior_pic_id Updated Successfully');
        }

        public function editSenior_pic_idView($id = null) {

            $fetchSenior_pic_id = new Senior_pic_idModel();
            $data['senior_pic_id'] = $fetchSenior_pic_id->find($id);

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

            return view('senior_pic_id/senior_pic_id_edit', $data);
        }


        public function deleteSenior_pic_id($id = null) {

            $deletesSenior_pic_id = new Senior_pic_idModel();
            $deletesSenior_pic_id->where('id', $id)->delete();


            // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
           /* if($deletesSenior_pic_id) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

            // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
            return redirect()->to(base_url().'/senior_pic_id')->with('success', 'Senior_pic_id Deleted Successfully');
        }


    }

    