<?php
require_once __DIR__ . '/../content/db.php';
require_once __DIR__.'/AbstractModel.php';

class News
    extends AbstractModel


{
    public $id;
    public $title;
    public $text;
    public $created_date;
    protected  static $tableName="News";


    public function __construct()
    {
        parent::__construct();
    }


    public function Remove()
    {
        if(false===$this->db->Remove($this->id)) {
            return false;
        };

        return $this->id;
    }


    public function Save()
    {

        if(isset($this->id)) {
            $data['id']=$this->id;
        }
        $data['title']=$this->title;
        $data['text']=$this->text;


        return $this->db->Update($data);
    }

}