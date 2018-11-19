

<?php



require_once 'conection_dependece.php';

$pdo = new PDO(
   
);    

    $users = $_GET['users'];

    $new_id_user = $_GET['new_name'];  
    $update_name = $_GET['update_name']; 

    $nombre_id = 'nombreID';
    $email_id = 'emailID';
    $update = 'update';
    $delete = 'delete';
   
   
   
       

        if($users === 'users'){
           
            $sql = "SELECT * FROM users";

        $sentence = $pdo->prepare($sql);
        
        $sentence->execute();
        
        $result = $sentence->fetchAll();

        $table = "";

        $table .= '<div class="container" >
        <table clas="table table-striped table-bordered"> 
            <tr>   
                    <th> Usuario </th>
                    <th> Nombre </th>
                    <th> Correo </th>
                    <th> Editar usuario </th>
                    <th> borrar usuario  </th>
            </tr> 
            ';
    
        
        foreach($result as $row){
            $table .= "<tr>
                        <td>  {$row['id']}   </td>
            ";
             $table .= '<td id= "'. $nombre_id.$row['id'].'">  '.$row['nombre'].' </td>';
             $table .= '<td id= "'. $email_id.$row['id'].'">  '.$row['email'].' </td>';
             $table .= '<td> <input onclick="updateUser(this.id)"  id="'.$row['id'].'" 
                        type="button" value="Editar" class="btn btn-default"> </td>';
             $table .= '<td> <input id="'.$delete.$row['id'].'" type="button" value="Borrar" 
                        class="btn btn-danger"> </td>';
             $table .= '<td> <input id="'.$update.$row['id'].'" onclick="updateUsers('.$row['id'].')" type="button" 
                        value="Actualizar" class="btn btn-primary" style="display:none;"> </td>';
             
             $table.= "</tr>";
        }
        
        $table .= "</table>";
        
        echo $table;

       
    }
   

   //                if(!empty())

    $pdo = null;


/**ACtualizar usuarios */
