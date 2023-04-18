<?php
$db = new Database();
$results = $db->getAll("tb_mahasiswa");

$data = array();
foreach ($results as $result) {
  $row = array();
  foreach ($result as $key => $value) {
    $row[$key] = $value;
  }
  $data[] = $row;
}
?>


<button type="button" onclick="window.location.href='create'" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" style="background-color:RGBA( 0, 0, 255, 0.7 ); color:white;">Tambah Data</button>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" style="background-color:RGBA( 65, 105, 225, 0.8 );">
      <tr>
        <th scope="col" class="px-6 py-3">
          No.
        </th>
        <th scope="col" class="px-6 py-3">
          Nim
        </th>
        <th scope="col" class="px-6 py-3">
          Nama
        </th>
        <th scope="col" class="px-6 py-3">
          Kelas
        </th>
        <th scope="col" class="px-6 py-3">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $row = 0;
      foreach ($data as $row) { ?>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" style="background-color:rgb(135, 206, 235,0.3);">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <?= $i ?>.
          </th>
          <td class="px-6 py-4">
            <?= $row['nim'] ?>
          </td>
          <td class="px-6 py-4 capitalize">
            <?= $row['nama'] ?>
          </td>
          <td class="px-6 py-4 uppercase">
            <?= $row['kelas'] ?>
          </td>
          <td class="px-6 py-4 text-right flex gap-5">
            <button type="button" onclick="window.location.href='update/<?= $row['id'] ?>'" class="fa fa-coffee font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-3" style="background-color:RGBA( 0, 0, 255, 0.7 ); color:white;">Edit</button>
            <button type="button" onclick="window.location.href='delete/<?= $row['id'] ?>'" class="font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-3" style="background-color:RGBA( 0, 0, 255, 0.7 ); color:white;">Delete</button>
          </td>
        </tr>
      <?php
        $i++;
      } ?>
    </tbody>
  </table>
</div>
