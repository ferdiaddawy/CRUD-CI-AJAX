<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <a href="#" class="btn btn-primary edit" id="0" data-toggle="modal" data-target="#myModal" style="margin-bottom: 25px;">Tambah Data</a>
            <table  id="example" class="table display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Hp</th>
                        <th>Foto</th>
                        <th>Aksi</th>
     
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
         <div class="col-md-2">
        </div>
    </div>
</div>



    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
            
            <?php echo form_open_multipart('crud/save', 'id="MyForm"'); ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="hidden"  id="txtid" name="txtid" >
                <input type="text" class="form-control" id="txtnama" name="txtnama" placeholder="Nama Lengkap" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">No HP</label>
                <input type="text" class="form-control" id="txthp" name="txthp" placeholder="No HP" required>
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Foto</label>
                <input type="file"  name="txtfoto">
              </div>
             
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>