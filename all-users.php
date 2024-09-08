<?php  include('inc/header.php');  ?> 

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">mobile</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    include('classes/users.php');
    $i=1;
    ?>
    <?php foreach(user::getAllUsers() as $row ):?>
    <?php /*?>
    //associative array
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['mobile'];?></td>
    </tr>
    <?php */?>

    <tr>
    <?php //object?>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $row->name;?></td>
      <td><?php echo $row->email;?></td>
      <td><?php echo $row->mobile;?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

