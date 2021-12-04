foreach($_POST['delete'] as $deleteid){
      
       

      $delp = $pdo2->prepare("DELETE FROM aptc_shop_cart WHERE id =$deleteid");
      $delp->execute();
      header("location: acc_shop_det.php?ucid=$ucid");

    
  }