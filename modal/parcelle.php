<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Modifier la parcelle</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="manager/update.php">
                <input type="hidden" class="parcelle" name="id">
                <input type="hidden" name="event" value="UPDATE_PARCELLE">
                <div class="form-group">
                    <label for="edit_commune" class="col-sm-3 control-label">Proprietaire</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proprietaire" name="proprietaire">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_commune" class="col-sm-3 control-label">Longuer</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_longueur" name="longueur">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_commune" class="col-sm-3 control-label">Largeur</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_largeur" name="largeur">
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
                <input type="hidden" class="parcelle" name="id">
                <input type="hidden" name="event" value="DELETE_PARCELLE">
                <div class="text-center">
                    <p>SUPPRIMER LA PARCELLE</p>
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


