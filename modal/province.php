<!-- Add -->
<div class="modal fade" id="addprovince">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter une province</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="manager/create.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="event" value="CREATE_PROVINCE" required>
                    <label for="province" class="col-sm-3 control-label">Nom de la province</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="province" name="province" required>
                    </div>
                </div>
               

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Enregistrer</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Modifier la province</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="manager/update.php">
                <input type="hidden" class="province" name="id">
                <input type="hidden" name="event" value="UPDATE_PROVINCE">
                <div class="form-group">
                    <label for="edit_province" class="col-sm-3 control-label">Province</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_province" name="province">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Modifier</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Suppression...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="manager/delete.php">
                <input type="hidden" class="province" name="id">
                <input type="hidden" name="event" value="DELETE_PROVINCE">
                <div class="text-center">
                    <p>SUPPRIMER LA PROVINCE</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Add une ville -->
<div class="modal fade" id="addville">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter une ville ou territoire à la province de/du </b><b class="fullname"></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="manager/create.php">
                <input type="hidden" class="province" name="id">
                <input type="hidden" name="event" value="CREATE_VILLE">
                <div class="form-group">
                    <label for="edit_province" class="col-sm-3 control-label">Ville</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="ville" name="ville">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_province" class="col-sm-3 control-label">Statut</label>

                    <div class="col-sm-9">
                    
                      <select class="form-control" name="statut" id="statut">
                      <?php
                        $sql = "SELECT * FROM t_statut_ville";
                        $req = $app->fetchPrepared($sql);
                        foreach($req as $row)
                        {
                            ?>
                            <option value="<?php echo $row['CodeStatut']; ?>"><?php echo $row['Statut']; ?></option>
                            <?php
                        }
                        ?>
                      </select>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Modifier</button>
              </form>
            </div>
        </div>
    </div>
</div>

