<?php

class Arts extends DB
{
    function getArts()
    {
        $query = "SELECT * FROM arts";
        return $this->execute($query);
    }

    function getArtsbyId($id)
    {
        $query = "SELECT * FROM arts WHERE id_art = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        $art_name = $data['art_name'];
        $id_member = $data['id_member'];


        $query = "insert into arts values ('', '$art_name', '$id_member')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM arts WHERE id_art = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $art_name = $data['art_name'];
        $query = "UPDATE arts SET art_name='$art_name' WHERE id_art=$id";
        return $this->execute($query);
    }
}
