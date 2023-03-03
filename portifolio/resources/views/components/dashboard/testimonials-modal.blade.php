
 
 <!-- Modal -->
 <div class="modal fade" id="modalTestimonials" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTestimonialsLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTestimonialsLabel">Testemunho ADD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/add/testimonials" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Nome</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Portifolio</label>
                <select class="form-control" name="portfolio" id="exampleFormControlSelect1">
                  @foreach ($portfolio as $k)
                  <option value="{{$k->id}}">{{$k->title}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Relato</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="report" rows="3"></textarea>
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