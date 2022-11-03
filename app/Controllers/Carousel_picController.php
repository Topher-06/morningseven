<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Carousel_picModel;

class Carousel_picController extends BaseController
{

    protected $helpers = ['form', 'text', 'html', 'url', 'date'];

    public function index()
    {

        $fetchCarousel_pic = new Carousel_picModel();
        $data['Carousel_pic'] = $fetchCarousel_pic->findAll();


        // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
        /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

        return view('carousel_pic/carousel_pic_list', $data);
    }

    public function tableCarousel_pic()
    {
        $fetchCarousel_pic = new Carousel_picModel();
        $data['Carousel_pic'] = $fetchCarousel_pic->findAll();

        foreach ($data['Carousel_pic'] as $value) {
            echo "<tr>
                <td> " . $value['c_id'] . " </td>
					<td> " . $value["c_id"] . " </td>
					<td> " . $value["c_picture"] . " </td>
					<td>
                <button data-edit_id='" . $value['c_id'] . "' id='Carousel_pic_edits'   data-toggle='modal' data-target='#Carousel_pic_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['c_id'] . "' id='Carousel_pic_deletes'  data-toggle='modal' data-target='#Carousel_pic_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
        }
    }

    public function apisCarousel_pic($id = null)
    {

        $fetchCarousel_pic = new Carousel_picModel();
        $data['Carousel_pic'] = $fetchCarousel_pic->where('c_id', $id)->findAll();

        foreach ($data['Carousel_pic'] as $value) {
            echo "<tr>
                <td> '" . $value['c_id'] . "' </td>
					<td> '" . $value["c_id"] . "' </td>
					<td> '" . $value["c_picture"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['c_id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['c_id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
        }
    }



    public function fetchCarousel_pic($id = null)
    {
        $fetchCarousel_pic = new Carousel_picModel();
        $data = $fetchCarousel_pic->find($id);
        echo json_encode($data);
    }

    public function fetchAPIsCarousel_pic($id = null)
    {
        $fetchCarousel_pic = new Carousel_picModel();
        $data = $fetchCarousel_pic->find($id);
        echo json_encode($data);
    }


    public function createCarousel_picView()
    {

        $fetchCarousel_pic = new Carousel_picModel();
        $data['Carousel_pic'] = $fetchCarousel_pic->findAll();

        // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
        /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

        return view('carousel_pic/carousel_pic_add', $data);
    }

    public function createCarousel_pic()
    {

        $insertCarousel_pic = new Carousel_picModel();

        // UNCOMMENT MO ITO KAPAG NEED MO MAG UPLOAD NG SINGLE FILE
        if ($img = $this->request->getFile('c_picture')) {
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
        //$insertCarousel_pic->insert($data);
        //}
        //}

        $data = array(
            'c_picture' => $newName,
        );

        //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
        $insertCarousel_pic->insert($data);

        // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
        /*
            $response = $insertCarousel_pic->save($data);
            if($insertCarousel_pic) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

        return redirect()->to(base_url() . '/carousel_pic')->with('success', 'Carousel_pic Created Successfully');
    }

    public function updateCarousel_pic($id = null)
    {

        $editsCarousel_pic = new Carousel_picModel();
        $dataCarousel_pic = $editsCarousel_pic->where('c_id',$id)->first();

        $db = db_connect();

        if ($img = $this->request->getFile('c_picture')) {
            if ($img->isValid() && !$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move('uploads/', $newName);
            }
        }

        // uncomment ito kapag may file ka sa edit page
        if (!empty($_FILES['c_picture']['name'])) {
            $db->query("UPDATE `carousel_pic` SET `c_picture` = '$newName' WHERE c_id =" . $id);
        }
        $data = array(
            'c_picture' => $newName,
        );

        $editsCarousel_pic->update($dataCarousel_pic, $data);

        //echo json_encode($data);

        return redirect()->to(base_url() . '/carousel_pic')->with('success', 'Carousel_pic Updated Successfully');
    }

    public function editCarousel_picView($id = null)
    {

        $fetchCarousel_pic = new Carousel_picModel();
        $data['carousel_pic'] = $fetchCarousel_pic->where('c_id',$id)->first();

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

        return view('carousel_pic/carousel_pic_edit', $data);
    }


    public function deleteCarousel_pic($id = null)
    {

        $deletesCarousel_pic = new Carousel_picModel();
        $deletesCarousel_pic->where('c_id', $id)->delete();


        // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
        /* if($deletesCarousel_pic) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

        // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
        return redirect()->to(base_url() . '/carousel_pic')->with('success', 'Carousel_pic Deleted Successfully');
    }
}
