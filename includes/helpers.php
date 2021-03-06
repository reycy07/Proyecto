<?php 

function showErrors($errors, $slot){

    $alert = '';
    if(isset($errors[$slot]) && !empty($slot)){
        $alert = "<div class = 'alert alert-error' >".$errors[$slot]."</div>";
    }
    return $alert;

}

function deleteError(){

    $remove = false;
    
    if(isset($_SESSION['errors']) ){
        $_SESSION['errors'] = null;
        $remove = true;
        
    }

    if(isset($_SESSION['errors_into']) ){
        $_SESSION['errors_into'] = null;
        
    }


    if(isset($_SESSION['completed'])){
        $_SESSION['completed'] = null;
        $remove = true;
    }

    return $remove;
}

function categoryPage($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id = '$id';";
    $category =mysqli_query($conexion, $sql);

    $result = array();

    if($category && mysqli_num_rows($category) >=1){
        $result = mysqli_fetch_assoc($category);
    }

    return $result;
}

function ticketPage($conexion, $id){
    $sql =  "SELECT e.* , c.nombre AS 'categoria', CONCAT(u.nombres,' ', u.apellidos) AS 'usuario' FROM entradas e".
            " INNER JOIN categorias c on e.categoria_id = c.id".
            " INNER JOIN usuarios u on e.usuario_id = u.id".
            " WHERE e.id = '$id'";
    $ticket =mysqli_query($conexion, $sql);

    $result = array();

    if($ticket && mysqli_num_rows($ticket) >=1){
        $result = mysqli_fetch_assoc($ticket);
    }

    return $result;
}

function categoryList($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $category =mysqli_query($conexion, $sql);

    $result = array();

    if($category && mysqli_num_rows($category) >=1){
        $result = $category;
    }

    return $result;
}

function viewTickes($conexion, $limit = null, $category = null, $search = null){
    $sql = "SELECT e.*,c.nombre AS categoria FROM entradas e".
    " INNER JOIN categorias c ON e.categoria_id = c.id ";

    if(!empty($category)){
        $sql .= "WHERE e.categoria_id = '$category'";
    }

    if(!empty($search)){
        $sql .= "WHERE e.titulo LIKE '%$search%'";
    }

    $sql.= " ORDER BY e.id DESC ";
    if($limit){
        $sql.= "LIMIT 4;";
    }

    // var_dump($sql);
    // die();

    $ticke =mysqli_query($conexion, $sql);

    $result = array();
    if($ticke && mysqli_num_rows($ticke) >= 1 ){
        $result = $ticke;
    }
    return $result;
}




?>