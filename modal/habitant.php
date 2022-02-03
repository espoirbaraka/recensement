<!-- Add -->
<div class="modal fade" id="addhabitant">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Ajouter un habitant</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="manager/create.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="event" value="CREATE_HABITANT" required>
                    <label for="nom" class="col-sm-3 control-label">Nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="postnom" class="col-sm-3 control-label">Post-nom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="postnom" name="postnom" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="prenom" class="col-sm-3 control-label">Prenom</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="telephone" class="col-sm-3 control-label">Telephone</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="telephone" name="telephone">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="sexe" class="col-sm-3 control-label">Sexe</label>

                    <div class="col-sm-9">
                      <select name="sexe" class="form-control" id="sexe">
                          <option value="Masculin">MASCULIN</option>
                          <option value="Feminin">FRMININ</option>
                      </select>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="pere" class="col-sm-3 control-label">Nom du pere</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="pere" name="pere" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="mere" class="col-sm-3 control-label">Nom de la mère</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="mere" name="mere" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="datenaiss" class="col-sm-3 control-label">Date de naissance</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="datenaiss" name="datenaiss" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="lieunaiss" class="col-sm-3 control-label">Lieu de naissance</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lieunaiss" name="lieunaiss" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="profession" class="col-sm-3 control-label">Profession</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="profession" name="profession" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="domaine" class="col-sm-3 control-label">Domaine d'étude</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="domaine" name="domaine">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" class="form-control" id="photo" name="photo">
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
                <h4 class="modal-title"><b>Modifier la personne</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="manager/update.php">
                    <input type="hidden" class="agent" name="id">
                    <input type="hidden" name="event" value="UPDATE_PERSONNE">
                    <div class="form-group">
                        <label for="edit_nom" class="col-sm-3 control-label">Nom</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_nom" name="nom" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_postnom" class="col-sm-3 control-label">Postnom</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_postnom" name="postnom" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_prenom" class="col-sm-3 control-label">Prenom</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_prenom" name="prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_prenom" class="col-sm-3 control-label">Telephone</label>

                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="edit_telephone" name="telephone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_prenom" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="edit_email" name="mail">
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
                <input type="hidden" class="habitant" name="id">
                <input type="hidden" name="event" value="DELETE_HABITANT">
                <div class="text-center">
                    <p>SUPPRIMER L'HABITANT</p>
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


