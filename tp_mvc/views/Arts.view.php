<?php

class ArtsView
{
    public function render($data)
    {
        $no = 1;
        $dataArts = null;
        $dataMembers = null;
        foreach ($data['arts'] as $val) {
            list($id_art, $art_name, $id_member) = $val;
            $dataArts .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $art_name . "</td>";
            foreach ($data['members'] as $val) {
                list($id, $nama, $email, $phone, $join_date) = $val;
                if ($id == $id_member) {
                    $dataArts .= "<td>" . $nama . "</td>";
                }
            }
            $dataArts .= "<td>
            <a href='arts.php?id_edit=" . $id_art .  "' class='btn btn-warning' '>Edit</a>
            <a href='arts.php?id_hapus_art=" . $id_art . "' class='btn btn-danger' '>Hapus</a>
          </td></tr>";
        }

        foreach ($data['members'] as $val) {
            list($id, $nama, $email, $phone, $join_date) = $val;
            $dataMembers .= "<option value='" . $id . "'>" . $nama . "</option>";
        }
        $form = '<form action="arts.php" method="POST">
        <div class="form-row">
          <div class="form-group col">
            <label for="art_name">Judul Art</label>
            <input type="text" class="form-control" name="art_name" required />
          </div>
        </div>


        <div class="form-row">
          <div class="form-group col">
            <label for="id_member">Members</label>
            <select class="custom-select form-control" name="id_member">
              <option selected>Open this select menu</option>
              OPTION
            </select>
          </div>
        </div>


        <button type="submit" name="add" class="btn btn-primary mt-3">Add</button>
      </form>';
        $tpl = new Template("templates/arts.html");
        $tpl->replace("FORM", $form);
        $tpl->replace("OPTION", $dataMembers);
        $tpl->replace("DATA_TABEL", $dataArts);
        $tpl->write();
    }
    public function renderedit($data, $data2)
    {
        $no = 1;
        $dataArts = null;
        $dataMembers = null;
        foreach ($data['arts'] as $val) {
            list($id_art, $art_name, $id_member) = $val;
            $dataArts .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $art_name . "</td>";
            foreach ($data['members'] as $val) {
                list($id, $nama, $email, $phone, $join_date) = $val;
                if ($id == $id_member) {
                    $dataArts .= "<td>" . $nama . "</td>";
                }
            }
            $dataArts .= "<td>
            <a href='arts.php?id_edit=" . $id_art .  "' class='btn btn-warning' '>Edit</a>
            <a href='arts.php?id_hapus_art=" . $id_art . "' class='btn btn-danger' '>Hapus</a>
          </td></tr>";
        }

        foreach ($data['members'] as $val) {
            list($id, $nama, $email, $phone, $join_date) = $val;
            $dataMembers .= "<option value='" . $id . "'>" . $nama . "</option>";
        }
        foreach ($data2 as $val) {
            list($id, $nama, $member_id) = $val;
            $namatemp = $nama;
        }
        $form = '<form action="arts.php?id=' . $id . '" method="POST">
        <div class="form-row">
          <div class="form-group col">
            <label for="art_name">Judul Art</label>
            <input type="text" class="form-control" name="art_name" value = "' . $namatemp . '" required />
          </div>
        </div>
        <br>
        <button class="btn btn-success" type="submit" name="submit"> Edit </button><br>

      </form>';
        $tpl = new Template("templates/arts.html");
        $tpl->replace("FORM", $form);
        $tpl->replace("OPTION", $dataMembers);
        $tpl->replace("DATA_TABEL", $dataArts);
        $tpl->write();
    }
}
