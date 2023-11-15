<?php 

include("../../conexion.php");

$stm =$conexion->prepare("SELECT * FROM contactos");
$stm->execute();
$contactos=$stm->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['id'])){
    

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("DELETE FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    header("location:index.php");
}


?>





<?php include("../../template/header.php");?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Nuevo
</button>
    <div class="table-responsive">
        <table class="table ">
            <thead class="table table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contactos as $contactos) { ?>
                <tr class="">
                    <td scope="row"><?php echo $contactos['id'];?></td>
                    <td><?php echo $contactos['telefono'];?></td>
                    <td><?php echo $contactos['nombre'];?></td>
                    <td><?php echo $contactos['fecha'];?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $contactos['id']; ?>" class="btn btn-success">Editar</a>
                        <a href="index.php?id=<?php echo $contactos['id']; ?>" class="btn btn-danger">Eliminar</a>



                    </td>


                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

     <?php include ("create.php"); ?>
    


<?php include("../../template/footer.php");?>

