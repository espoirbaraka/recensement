<!-- affecter -->
<div class="modal fade" id="affecter">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Affecter <span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="manager/create.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="agent" name="id">
                        <input type="hidden" name="event" value="CREATE_AFFECTATION" required>
                        <label for="quartier" class="col-sm-3 control-label">Quartier</label>

                        <div class="col-sm-9">
                            <select name="quartier" class="form-control" id="">
                            <?php
                            $sql = "SELECT * FROM t_quartier";
                            $req = $app->fetchPrepared($sql);
                            foreach ($req as $row) {
                            ?>
                                <option value="<?php echo $row['CodeQuartier']; ?>"><?php echo $row['Quartier']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                            
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="commune" class="col-sm-3 control-label">Date debut</label>
                        <div class="col-sm-9">
                            <input type="date" name="debut" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="commune" class="col-sm-3 control-label">Date fin</label>
                        <div class="col-sm-9">
                            <input type="date" name="fin" class="form-control">
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
                <h4 class="modal-title"><b>Modifier l'agent</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="manager/update.php">
                    <input type="hidden" class="agent" name="id">
                    <input type="hidden" name="event" value="UPDATE_AGENT">
                    <div class="form-group">
                        <label for="edit_nom" class="col-sm-3 control-label">Nom</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_nom" name="nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_postnom" class="col-sm-3 control-label">Postnom</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_postnom" name="postnom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_prenom" class="col-sm-3 control-label">Prenom</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_prenom" name="prenom">
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
                    <input type="hidden" class="agent" name="id">
                    <input type="hidden" name="event" value="DELETE_AGENT">
                    <div class="text-center">
                        <p>SUPPRIMER</p>
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