<?php
    $query_user = "select * from users WHERE user_id = '" . $_SESSION["user_id"] . "'";
    $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
    while ($user_info = mysqli_fetch_array($result_query_user)){
        $user_id = $user_info['user_id'];
        $user_user_name = $user_info['user_user_name'];
    }
    
?>
                    <h3>Mis mascotas</h3>
                    <button class="btn btn-alert" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Agregar Mascota
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <form action="./config_profile.php" method="post" enctype="multipart/form-data">
                                <input id="user_id" name="user_id" value="<?php echo $user_id;?>" style="display:none;">
                                <input id="user_user_name" name="user_user_name" value="<?php echo $user_user_name;?>" style="display:none;">
                                <div class="form-group">
                                    <label for="pet_name">Nombre de la mascota</label>
                                    <input type="text" class="form-control" id="pet_name" name="pet_name" aria-describedby="" placeholder="Escribe el nombre tu mascota" required>
                                </div>
                                <div class="image-upload">
                                    <p>Foto de mascota</small></p>
                                    <input type="file" class="form-control" id="pet_avatar" name="pet_avatar" aria-describedby="pet_avatar" />
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="pet_type">Tipo de mascota</label>
                                    <select class="form-control" id="pet_type" name="pet_type" >
                                        <option value="Perro">Perro</option>
                                        <option value="Gato">Gato</option>
                                        <option value="Ave">Ave</option>
                                        <option value="Roedor">Roedor</option>
                                        <option value="Pez">Pez</option>
                                        <option value="Reptil">Reptil</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pet_gender">Género</label>
                                    <select class="form-control" id="pet_gender" name="pet_gender" >
                                        <option value="Macho" >Macho</option>
                                        <option value="Hembra" >Hembra</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pet_race">Raza</label>
                                    <input type="text" class="form-control" id="pet_race" name="pet_race" aria-describedby="" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="pet_country">País</label>
                                    <input type="text" class="form-control" id="pet_country" name="pet_country" aria-describedby="" placeholder="Donde vive tu mascota">
                                </div>
                                <div class="form-group">
                                    <label for="pet_birthdate">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="pet_birthdate" name="pet_birthdate" placeholder="Contraseña" max="">
                                </div>
                                <div class="form-group">
                                    <label for="pet_about">Sobre mi mascota</label>
                                    <textarea class="form-control" id="pet_about" name="pet_about" aria-describedby="" placeholder="" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pet_medical_prescription">Prescripción médica</label>
                                    <textarea class="form-control" id="pet_medical_prescription" name="pet_medical_prescription" aria-describedby="" placeholder="" ></textarea>
                                </div>
                                <button type="submit" id="submit_2" name="submit_2" class="btn btn-primary">Guardar</button>
                                <br>
                            </form>
                        </div>
                    </div>

<?php
    $query_pet = "select * from pets WHERE user_id = '" . $_SESSION["user_id"] . "'";
    $result_query_pet = mysqli_query($linkli,$query_pet) or die(mysqli_error());
    while ($pet_info = mysqli_fetch_array($result_query_pet)){
        $pet_id = $pet_info['pet_id'];
        $pet_name = $pet_info['pet_name'];
        $pet_type = $pet_info['pet_type'];
        $pet_race = $pet_info['pet_race'];
        $pet_avatar = $pet_info['pet_avatar'];

        echo '<div class="card border-light mb-3">
        <div class="card-header">'. $pet_name .'</div>
        <div class="card-body">
            <img src="'.$pet_avatar.'" width="100px">
            <h5 class="card-title">'. $pet_type .' - '. $pet_race . '</h5>
            <p class="card-text">Sobre mi mascota</p>
        </div>
      </div>';
    }
    
?>

