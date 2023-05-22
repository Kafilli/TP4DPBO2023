<?php
include_once("conf.php");
include_once("models/Arts.class.php");
include_once("models/Members.class.php");
include_once("views/Arts.view.php");

class ArtsController
{
    private $arts;
    private $members;

    function __construct()
    {
        $this->arts = new Arts(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->arts->open();
        $this->members->open();
        $this->arts->getArts();
        $this->members->getMembers();

        $data = array(
            'arts' => array(),
            'members' => array()
        );
        while ($row = $this->arts->getResult()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            array_push($data['arts'], $row);
        }
        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }
        $this->arts->close();
        $this->members->close();

        $view = new ArtsView();
        $view->render($data);
    }
    public function indexedit($id)
    {
        $this->arts->open();
        $this->members->open();
        $this->arts->getArts();
        $this->members->getMembers();

        $data = array(
            'arts' => array(),
            'members' => array()
        );
        while ($row = $this->arts->getResult()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            array_push($data['arts'], $row);
        }
        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }
        $this->arts->close();
        $this->members->close();

        $this->arts->open();
        $this->arts->getArtsbyId($id);
        $data2 = array();
        while ($row = $this->arts->getResult()) {
            array_push($data2, $row);
        }
        $this->arts->close();

        $view = new ArtsView();
        $view->renderedit($data, $data2);
    }


    function add($data)
    {
        $this->arts->open();
        $this->arts->add($data);
        $this->arts->close();

        header("location:arts.php");
    }

    function edit($id, $data)
    {
        $this->arts->open();
        $this->arts->edit($id, $data);
        $this->arts->close();

        header("location:arts.php");
    }

    function delete($id)
    {
        $this->arts->open();
        $this->arts->delete($id);
        $this->arts->close();

        header("location:arts.php");
    }
}
