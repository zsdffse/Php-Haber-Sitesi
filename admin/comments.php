<?php

include("_header.php");
include("php/baglanti.php");

$baglanti->set_charset("utf8");
$baglanti->query('SET NAMES utf8');

 ?>
  <div class="content-wrapper">
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0 text-dark">Yorumlar</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
           <li class="breadcrumb-item active"></li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </section>

     <div id="content-wrapper">
         <div class="container-fluid">
             <hr>

             <table class="table table-bordered">
                 <thead class="thead-dark">
                     <tr>
                         <th>ID</th>
                         <th>Yazar</th>
                         <th>E-mail</th>
                         <th>Yorum</th>
                         <th>Tarih</th>
                         <th>Durum</th>
                         <th>Hareketler</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php

                 $sql = $baglanti->query("SELECT * FROM yorumlar ORDER BY comment_id DESC");
                  $k= 1;
                 // Sonuçları Alalım.
                 while($sonuc = $sql->fetch_assoc()){
                   $comment_id = $sonuc["comment_id"];
                   $comment_post_id = $sonuc["comment_post_id"];
                   $comment_author = $sonuc["comment_author"];
                   $comment_date =date('Y-m-d H:i:s');
                   $comment_email= $sonuc["comment_email"];
                   $comment_status = $sonuc["comment_status"];
                   $comment_text =substr($sonuc["comment_text"], 0, 100);
                  echo "<tr>
                         <td>{$comment_id}</td>
                         <td>{$comment_author}</td>
                         <td>{$comment_email}</td>
                         <td>{$comment_text}</td>
                         <td>{$comment_date}</td>
                         <td>{$comment_status}</td>";

                         $query =$baglanti->query("SELECT * FROM yazilar WHERE ID = $comment_post_id");
                         while($sonuc = $query->fetch_assoc()){
                           $post_id =$sonuc["ID"];
                           $haber_baslik =$sonuc["BASLIK"];


}




                       // echo"<td>{$haber_baslik}</td>";

                      echo "<td>
                             <div class='dropdown'>
                                 <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                     Hareketler
                                 </button>
                                 <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                     <a class='dropdown-item' data-toggle='modal' data-target='#view_modal$k' href='#'>Göster</a>
                                     <div class='dropdown-divider'></div>
                       <a class='dropdown-item' href='comments.php?delete={$comment_id}'>Sil</a>
                                     <div class='dropdown-divider'></div>
                       <a class='dropdown-item' href='comments.php?approved={$comment_id}'>Onayla</a>
                                     <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='comments.php?unapproved={$comment_id}'>Onaylama</a>
                                 </div>
                             </div>
                         </td>
                     </tr>";


                     ?>

                     <div id="view_modal<?php echo $k; ?>" class="modal fade">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Yorum</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <form action="" method="post" enctype="multipart/form-data">
                                         <div class="form-group">
                                             <label for="comment_author">Comment Author</label>

                       <input type="text" readonly class="form-control" name="comment_author" value="<?php  echo $comment_author; ?>">
                                         </div>
                                         <div class="form-group">
                                             <label for="comment_email">Comment Email</label>
                       <input type="text" readonly class="form-control" name="comment_email" value="<?php echo $comment_email; ?>">
                                         </div>
                                         <div class="form-group">
                                             <label for="comment_text">Comment Text</label>
                                             <textarea readonly class="form-control" name="comment_text" id="" cols="20" rows="5"><?php echo $comment_text; ?></textarea>
                                         </div>
                                         <div class="form-group">
                                             <label for="comment_status">Comment Status</label>
                          <input type="text" class="form-control" name="comment_status" value="<?php echo $comment_status; ?>">
                                         </div>
                                         <div class="form-group">
                                             <label for="commented_post">Commented Post</label>
                         <input type="text" readonly class="form-control" name="commented_post" value="<?php echo $haber_baslik; ?>">
                                         </div>
                                         <div class="form-group">
                                             <input type="hidden" name="comment_id" value="">
                                             <input type="submit" class="btn btn-primary" name="view_post" value="View Post">
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>

                   <?php $k++; } ?>

                 </tbody>
             </table>

             <?php
             if (isset($_GET["approved"])) {
              $the_comment_id =$_GET["approved"];

              $sql_query ="UPDATE yorumlar SET comment_status ='approved' WHERE comment_id ={$the_comment_id}";

              $approve_comment_query =mysqli_query($baglanti,$sql_query);
              header("Location:comments.php");
             }

             if (isset($_GET["unapproved"])) {
              $the_comment_id =$_GET["unapproved"];

              $sql_query ="UPDATE yorumlar SET comment_status ='unapproved' WHERE comment_id ={$the_comment_id}";

              $unapprove_comment_query =mysqli_query($baglanti,$sql_query);
              header("Location:comments.php");
             }

             ?>



             <?php
             if (isset($_GET["delete"])) {
              $del_comment_id =$_GET["delete"];

              $sql_query ="DELETE FROM yorumlar WHERE comment_id ={$del_comment_id}";

              $delete_comment_query =mysqli_query($baglanti,$sql_query);
              header("Location:comments.php");
             }
             ?>




</div>

</div>
</div>


   <?php

   include("footer.php");

   ?>
