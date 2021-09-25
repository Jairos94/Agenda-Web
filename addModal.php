<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h4 class="modal-title">Agregar Contacto</h4>
            </center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <div class="madal-body">
                <div class="container-fluid">
                    <form method="POST" action="agregar.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="control-label">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="text form-control" name="nombrecontacto">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="control-label">Celular:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="tel" class="text form-control" name="celular">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="control-label">Emal:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="text form-control" name="email">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="control-label">Direccion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="text form-control" name="direccion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                            <button type="submit" name="add" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>