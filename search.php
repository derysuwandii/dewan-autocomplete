<?php  
  include 'koneksi.php';
  
  if(isset($_POST["query"])){
    $output = '';
    $key = "%".$_POST["query"]."%";
    $query = "SELECT * FROM provinsi WHERE nama LIKE ? LIMIT 10";
    $dewan1 = $db1->prepare($query);
    $dewan1->bind_param('s', $key);
    $dewan1->execute();
    $res1 = $dewan1->get_result();

    $output = '<ul class="list-unstyled">';
    if($res1->num_rows > 0){
      while ($row = $res1->fetch_assoc()) {
        $output .= '<li><span id="data-kode" style="display:none;">B0001</span> <span id="data-nama">Minyak</span> <span id="data-harga" style="display:none;">100000</span> </li>';
      }
    } else {
      $output .= '<li>Tidak ada yang cocok.</li>';  
    }  
    $output .= '</ul>';
    echo $output;
  }
?>  