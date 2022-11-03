<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomsModel;

class RoomsController extends BaseController
{

    protected $helpers = ['form', 'text', 'html', 'url', 'date'];

    public function index()
    {

        $fetchRooms = new RoomsModel();
        $data['Rooms'] = $fetchRooms->findAll();


        // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
        /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

        return view('rooms/rooms_list', $data);
    }

    public function tableRooms()
    {
        $fetchRooms = new RoomsModel();
        $data['Rooms'] = $fetchRooms->findAll();

        foreach ($data['Rooms'] as $value) {
            echo "<tr>
                <td> " . $value['id'] . " </td>
					<td> " . $value["r_id"] . " </td>
					<td> " . $value["Picture"] . " </td>
					<td> " . $value["Category"] . " </td>
					<td> " . $value["Type"] . " </td>
					<td> " . $value["Capacity"] . " </td>
					<td> " . $value["Room_Count"] . " </td>
					<td> " . $value["Price"] . " </td>
					<td>
                <button data-edit_id='" . $value['id'] . "' id='Rooms_edits'   data-toggle='modal' data-target='#Rooms_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['id'] . "' id='Rooms_deletes'  data-toggle='modal' data-target='#Rooms_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
        }
    }

    public function apisRooms($id = null)
    {

        $fetchRooms = new RoomsModel();
        $data['Rooms'] = $fetchRooms->where('id', $id)->findAll();

        foreach ($data['Rooms'] as $value) {
            echo "<tr>
                <td> '" . $value['id'] . "' </td>
					<td> '" . $value["r_id"] . "' </td>
					<td> '" . $value["Picture"] . "' </td>
					<td> '" . $value["Category"] . "' </td>
					<td> '" . $value["Type"] . "' </td>
					<td> '" . $value["Capacity"] . "' </td>
					<td> '" . $value["Room_Count"] . "' </td>
					<td> '" . $value["Price"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
        }
    }



    public function fetchRooms($id = null)
    {
        $fetchRooms = new RoomsModel();
        $data = $fetchRooms->find($id);
        echo json_encode($data);
    }

    public function fetchAPIsRooms($id = null)
    {
        $fetchRooms = new RoomsModel();
        $data = $fetchRooms->find($id);
        echo json_encode($data);
    }


    public function createRoomsView()
    {

        $fetchRooms = new RoomsModel();
        $data['Rooms'] = $fetchRooms->findAll();

        // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
        /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

        return view('rooms/rooms_add', $data);
    }

    public function createRooms()
    {

        $insertRooms = new RoomsModel();

        // UNCOMMENT MO ITO KAPAG NEED MO MAG UPLOAD NG SINGLE FILE
        if ($img = $this->request->getFile('Picture')) {
            if ($img->isValid() && !$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move('uploads/', $newName);
            }
        }

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
        //$insertRooms->insert($data);
        //}
        //}



        $data = array(
            'Picture' => $newName,
            'Category' => $this->request->getPost('Category'),
            'Type' => $this->request->getPost('Type'),
            'Capacity' => $this->request->getPost('Capacity'),
            'Room_Count' => $this->request->getPost('Room_Count'),
            'Price' => $this->request->getPost('Price'),
            'Price2' => $this->request->getPost('Price2'),
            'Price3' => $this->request->getPost('Price3'),
        );

        //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
        $insertRooms->insert($data);

        // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
        /*
            $response = $insertRooms->save($data);
            if($insertRooms) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

        return redirect()->to(base_url() . '/rooms')->with('success', 'Rooms Created Successfully');
    }

    public function updateRooms($id = null)
    {

        $editsRooms = new RoomsModel();
        $dataRooms = $editsRooms->where('r_id', $id)->first();


        $db = db_connect();

        if ($img = $this->request->getFile('Picture')) {
            if ($img->isValid() && !$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move('uploads/', $newName);
            }
        }
        // uncomment ito kapag may file ka sa edit page
        if (!empty($_FILES['Picture']['name'])) {
            $db->query("UPDATE `rooms` SET `Picture` = '$newName' WHERE r_id =" . $id);
        }


        $data = array(
            'Category' => $this->request->getPost('Category'),
            'Type' => $this->request->getPost('Type'),
            'Capacity' => $this->request->getPost('Capacity'),
            'Room_Count' => $this->request->getPost('Room_Count'),
            'Price' => $this->request->getPost('Price'),
            'Price2' => $this->request->getPost('Price2'),
            'Price3' => $this->request->getPost('Price3'),
        );

        $editsRooms->update($dataRooms, $data);

        //echo json_encode($data);

        return redirect()->to(base_url() . '/rooms')->with('success', 'Rooms Updated Successfully');
    }

    public function editRoomsView($id = null)
    {

        $fetchRooms = new RoomsModel();
        $data['rooms'] = $fetchRooms->where('r_id', $id)->first();

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

        return view('rooms/rooms_edit', $data);
    }


    public function deleteRooms($id = null)
    {

        $deletesRooms = new RoomsModel();
        $deletesRooms->where('r_id', $id)->delete();


        // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
        /* if($deletesRooms) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

        // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
        return redirect()->to(base_url() . '/rooms')->with('success', 'Rooms Deleted Successfully');
    }
}
