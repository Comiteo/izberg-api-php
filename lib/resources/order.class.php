<?php namespace Ice;

require_once("resource.class.php");

class Order extends Resource
{

	/**
	* Updates status of existing order
	*
	* Status : authorizeOrder |  updateOrderPayment
	*
	* @returns object
	*
	**/
	public function updateStatus($status, $id_order = null)
	{
		if (!$id_order && !$this->_id)
			throw new Exception("No order_id and no URI");
		if ($status != "updateOrderPayment" && $status != "authorizeOrder" && $status != "cancel")
			throw new Exception("Wrong Status : authorizeOrder | updateOrderPayment");
		$id = $id_order ? $id_order : $this->_id;
		return	(parent::$Iceberg->Call($this->_name.'/'.$id.'/'.$status.'/', 'POST'));
	}

}


class MerchantOrder extends Resource
{
	/**
	* Updates status of existing merchant order
	*
	* Status : confirm | send | cancel
	*
	* @returns object
	*
	**/
	public function updateStatus($status, $id_order)
	{
		return	(parent::$Iceberg->Call($this->getName().'/'.$id_order.'/'.$status.'/', 'POST'));
	}
}

class OrderItem extends Resource
{
	/**
	* Updates status of existing order item
	*
	* Status : confirm | send | cancel
	*
	* @returns object
	*
	**/
	public function updateStatus($status, $id_order = null)
	{
		if (!$id_order && !$this->_id)
			throw new Exception("No order_id and no URI");
		if ($status != "confirm" && $status != "send" && $status != "cancel")
			throw new Exception("Wrong Status : send | confirm | cancel");
		$id = $id_order ? $id_order : $this->_id;
		return	(parent::$Iceberg->Call($this->_name.'/'.$id.'/'.$status.'/', 'POST'));
	}
}
