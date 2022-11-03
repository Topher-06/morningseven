<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventsModel;

class EventsController extends BaseController
{

    protected $helpers = ['form', 'text', 'html', 'url', 'date'];

    public function index()
    {

        $fetchEvents = new EventsModel();
        $data['Events'] = $fetchEvents->findAll();


        // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
        /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

        return view('events/events_list', $data);
    }

    public function tableEvents()
    {
        $fetchEvents = new EventsModel();
        $data['Events'] = $fetchEvents->findAll();

        foreach ($data['Events'] as $value) {
            echo "<tr>
                <td> " . $value['id'] . " </td>
					<td> " . $value["e_id"] . " </td>
					<td> " . $value["e_image"] . " </td>
					<td> " . $value["e_date"] . " </td>
					<td> " . $value["e_title"] . " </td>
					<td>
                <button data-edit_id='" . $value['id'] . "' id='Events_edits'   data-toggle='modal' data-target='#Events_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['id'] . "' id='Events_deletes'  data-toggle='modal' data-target='#Events_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
        }
    }

    public function apisEvents($id = null)
    {

        $fetchEvents = new EventsModel();
        $data['Events'] = $fetchEvents->where('id', $id)->findAll();

        foreach ($data['Events'] as $value) {
            echo "<tr>
                <td> '" . $value['id'] . "' </td>
					<td> '" . $value["e_id"] . "' </td>
					<td> '" . $value["e_image"] . "' </td>
					<td> '" . $value["e_date"] . "' </td>
					<td> '" . $value["e_title"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
        }
    }



    public function fetchEvents($id = null)
    {
        $fetchEvents = new EventsModel();
        $data = $fetchEvents->find($id);
        echo json_encode($data);
    }

    public function fetchAPIsEvents($id = null)
    {
        $fetchEvents = new EventsModel();
        $data = $fetchEvents->find($id);
        echo json_encode($data);
    }


    public function createEventsView()
    {

        $fetchEvents = new EventsModel();
        $data['Events'] = $fetchEvents->findAll();

        // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
        /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

        return view('events/events_add', $data);
    }

    public function createEvents()
    {

        $insertEvents = new EventsModel();

        // UNCOMMENT MO ITO KAPAG NEED MO MAG UPLOAD NG SINGLE FILE
        if ($img = $this->request->getFile('e_image')) {
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
        //$insertEvents->insert($data);
        //}
        //}



        $data = array(
            'e_id' => $this->request->getPost('e_id'),
            'e_image' => $newName,
            'e_date' => $this->request->getPost('e_date'),
            'e_title' => $this->request->getPost('e_title'),
        );

        //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
        $insertEvents->insert($data);

        // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
        /*
            $response = $insertEvents->save($data);
            if($insertEvents) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

        return redirect()->to(base_url() . '/events')->with('success', 'Events Created Successfully');
    }

    public function updateEvents($id = null)
    {

        $editsEvents = new EventsModel();
        $dataEvents = $editsEvents->find($id);
        $db = \Config\Database::connect();

        if ($img = $this->request->getFile('e_image')) {
            if ($img->isValid() && !$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move('uploads/', $newName);
            }
        }

        // uncomment ito kapag may file ka sa edit page
        if (!empty($_FILES['e_image']['name'])) {
            $db->query("UPDATE `events` SET `e_image` = '$newName' WHERE e_id =" . $id);
        }


        $data = array(
            'e_date' => $this->request->getPost('e_date'),
            'e_title' => $this->request->getPost('e_title'),
        );

        $editsEvents->update($dataEvents, $data);

        //echo json_encode($data);

        return redirect()->to(base_url() . '/events')->with('success', 'Events Updated Successfully');
    }

    public function editEventsView($id = null)
    {

        $fetchEvents = new EventsModel();
        $data['events'] = $fetchEvents->find($id);

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

        return view('events/events_edit', $data);
    }


    public function deleteEvents($id = null)
    {

        $deletesEvents = new EventsModel();
        $deletesEvents->where('id', $id)->delete();


        // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
        /* if($deletesEvents) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

        // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
        return redirect()->to(base_url() . '/events')->with('success', 'Events Deleted Successfully');
    }
}
