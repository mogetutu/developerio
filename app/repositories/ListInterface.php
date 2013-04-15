<?php 

interface ListInterface {
    public function getAllListsByUser();
    public function getListByUser($id);
    public function createList();
    public function updateList($id);
    public function deleteUserList($id);
}
