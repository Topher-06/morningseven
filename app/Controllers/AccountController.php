<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class AccountController extends BaseController
{

    protected $helpers = ['form', 'text', 'html', 'url', 'date'];

    public function index()
    {

        $fetchAccount = new AccountModel();
        $data['Account'] = $fetchAccount->findAll();


        // UNCOMMENT MO ITO KAPAG MAY SELECT KA SA MODAL VIEW
        /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

        return view('account/account_list', $data);
    }
    public function AccountMonitoring()
	{
		$fetchAccount = new AccountModel();
		$data['Account'] = $fetchAccount->findAll();
		return view('account/account_monitoring', $data);
	}

    public function tableAccount()
    {
        $fetchAccount = new AccountModel();
        $data['Account'] = $fetchAccount->findAll();

        foreach ($data['Account'] as $value) {
            echo "<tr>
                <td> " . $value['id'] . " </td>
					<td> " . $value["email"] . " </td>
					<td> " . $value["password"] . " </td>
					<td> " . $value["fullname"] . " </td>
					<td> " . $value["contact"] . " </td>
					<td> " . $value["role"] . " </td>
					<td>
                <button data-edit_id='" . $value['id'] . "' id='Account_edits'   data-toggle='modal' data-target='#Account_edit' class='btn btn-success btn-sm edit text-white'>
                <i class='mdi mdi-pencil-box-outline'></i>Edit</button>
                <button data-delete_id='" . $value['id'] . "' id='Account_deletes'  data-toggle='modal' data-target='#Account_delete' class='btn btn-danger btn-sm delete'>
                <i class='mdi mdi-trash-can-outline'></i>Delete</button>
                </td>
                </tr>";
        }
    }

    public function apisAccount($id = null)
    {

        $fetchAccount = new AccountModel();
        $data['Account'] = $fetchAccount->where('id', $id)->findAll();

        foreach ($data['Account'] as $value) {
            echo "<tr>
                <td> '" . $value['id'] . "' </td>
					<td> '" . $value["email"] . "' </td>
					<td> '" . $value["password"] . "' </td>
					<td> '" . $value["fullname"] . "' </td>
					<td> '" . $value["contact"] . "' </td>
					<td> '" . $value["role"] . "' </td>
					<td>
                <a class='btn btn-success btn-sm edit' data-id= '" . $value['id'] . "' ><i class='mdi mdi-pencil-box-outline'></i>Edit</a>

                <a class='btn btn-danger btn-sm delete' data-id= '" . $value['id'] . "' ><i class='mdi mdi-trash-can-outline'></i>Delete</a>
                </td>
                </tr>";
        }
    }



    public function fetchAccount($id = null)
    {
        $fetchAccount = new AccountModel();
        $data = $fetchAccount->find($id);
        echo json_encode($data);
    }

    public function fetchAPIsAccount($id = null)
    {
        $fetchAccount = new AccountModel();
        $data = $fetchAccount->find($id);
        echo json_encode($data);
    }


    public function createAccountView()
    {

        $fetchAccount = new AccountModel();
        $data['Account'] = $fetchAccount->findAll();

        // UNCOMMENT MO TO KAPAG NEED MO GUMAWA NG ARRAY PARA SA SELECT() FIELD
        /*
            $db = db_connect();
            $data['VARIABLE_NAME'] = $db->query('SELECT * FROM NAME_OF_TABLE_HERE')->getResultArray();

            $data['VARIABLE_NAME_FOR_LIST'] = array();
            foreach ($data['VARIABLE_NAME'] as $value) {
                $data['VARIABLE_NAME_FOR_LIST'] += [$value['TABLE_COLUMN_NAME'] => $value['TABLE_COLUMN_NAME']];
            }
            */

        return view('account/account_add', $data);
    }

    public function createAccount()
    {

        $insertAccount = new AccountModel();

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
        //$insertAccount->insert($data);
        //}
        //}



        $data = array(
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
            'fullname' => $this->request->getPost('fullname'),
            'contact' => $this->request->getPost('contact'),
            'role' => $this->request->getPost('role'),
            'status' => 'Not Active'
        );

        //I-COMMENT MO TO KAPAG UNG INSERT MO GALING SA PAGE
        $insertAccount->insert($data);

        // UNCOMMENT MO ITO KAPAG UNG INSERT MO GALING SA MODAL
        /*
            $response = $insertAccount->save($data);
            if($insertAccount) {
                echo 'success';
            } else {
                echo 'failed';
            }

            */

        return redirect()->to(base_url() . '/account')->with('success', 'Account Created Successfully');
    }

    public function updateAccount($id = null)
    {

        $editsAccount = new AccountModel();
        $dataAccount = $editsAccount->find($id);

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
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
            'fullname' => $this->request->getPost('fullname'),
            'contact' => $this->request->getPost('contact'),
            'role' => $this->request->getPost('role'),
        );

        $editsAccount->update($dataAccount, $data);

        //echo json_encode($data);

        return redirect()->to(base_url() . '/account')->with('success', 'Account Updated Successfully');
    }

    public function editAccountView($id = null)
    {

        $fetchAccount = new AccountModel();
        $data['account'] = $fetchAccount->find($id);

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

        return view('account/account_edit', $data);
    }


    public function deleteAccount($id = null)
    {

        $deletesAccount = new AccountModel();
        $deletesAccount->where('id', $id)->delete();


        // UNCOMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
        /* if($deletesAccount) {
                echo 'success';
            } else {
                echo 'error';
            }
            */

        // I-COMMENT MO ITO KAPAG UNG DELETE MO GALING SA MODAL
        return redirect()->to(base_url() . '/account')->with('success', 'Account Deleted Successfully');
    }
}
