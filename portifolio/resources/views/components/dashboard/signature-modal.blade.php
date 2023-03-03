 <!-- Modal -->
 <div class="modal fade" id="modalSignature" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalSignatureLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSignatureLabel">Signature ADD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/add/signature" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlSelect1">Tipo</label>
              <select class="form-control" name="type" id="exampleFormControlSelect1">
                <option value="Premium">Premium</option>
                <option value="Basic">Basic</option>
                <option value="Turbo">Turbo</option>
                <option value="Full">Full</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Tipo de pagamento</label>
              <select class="form-control" name="payament_type" id="exampleFormControlSelect1">
                <option value="car">Cartão</option>
                <option value="bol">Boleto</option>
                <option value="pix">Pix</option>
                <option value="esp">Especie</option>
              </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Preço</label>
                <input type="text" name="price" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Adicionar</button>
        </form>
        </div>
      </div>
    </div>
  </div>