<?php
class Selection{
	private $select;
	private $from;
	private $where;
	private $order;

	//initialize default attributs
	public function __construct(){
		$this->select="SELECT";
		$this->from="FROM";
	}
	//affecting column names to select attribute
	public function select($params){
	$this->select.=" ".$params;
			return $this;
	}
	//affecting table name to from attribute
	public function from($param){
	$this->from.=" ".$param;
		return $this;
	}
	//affecting a condition if exists
	public function where($cond){
	$this->where.="WHERE(".$cond.")";
		return $this;
	}
	//fetching order
	public function order($param){
	$this->order.="ORDER BY ".$param;
		return $this;
	}
	//creating the full query
    public function make(){
    $query=$this->select." ".$this->from;
    if(!empty($this->where)){
	$query=$query." ".$this->where;
    }
    if(!empty($this->order)){
	$query= $query." ".$this->order;
    }
       return $query;
}
}
//creating a selection instance to make our query
$select=new Selection();
$query=$select->select("name,age")->from("animals")->where("age=5")->make();
$select2=new Selection();
$query2=$select2->select("name,phone,age")->from("users")->where("city=germany")->order("age")->make();
$select3=new Selection();
$query3=$select3->select("*")->from("cities")->make();
//printing our queries to the screen
echo "query: ";print($query); echo '<br>';
echo "query2: ";print($query2);echo '<br>';
echo "query3: ";print($query3); 