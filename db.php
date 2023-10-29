<?php
class Db
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = 'nguyentrongbao_ltwccq2211ab';
    private $conn = null;
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
    //lay tat ca
    public function getAll()
    {
        $sql = "SELECT id, name, image, status FROM 0073_brand WHERE status!='0'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //lay ra mot
    public function getOne($id)
    {
        $sql = "SELECT * FROM 0073_brand WHERE id = '$id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
    //so luong
    public function getCount()
    {
        $sql = "SELECT id, name, image, status FROM 0073_brand WHERE status!='0'";
        $result = $this->conn->query($sql);
        return $result->num_rows;
    }
    //them
    public function insert($data)
    {
        $strf="";
        $strv="";
        foreach($data as $f=>$v)
        {
            $strf.="$f, ";
            $strv.="'$v', ";

        }
        $strf = rtrim(rtrim($strf),',' );
        $strv = rtrim(rtrim($strv),',' );
        $sql = "INSERT INTO 0073_brand($strf) VALUES($strv)";
        $this->conn->query($sql);

    }
    //sua
    public function update($data,$id)
    {
        $strset="";
        foreach($data as $f=>$v)
        {
            $strset.="$f='$v', ";

        }
        $strset = rtrim(rtrim($strset),',' );
        $sql = "UPDATE 0073_brand SET $strset WHERE id='$id'";
        $this->conn->query($sql);

    }
    //xoa
    public function delete($id)
    {
        $sql = "DELETE FROM 0073_brand WHERE id='$id'";
        $this->conn->query($sql);

    }
}