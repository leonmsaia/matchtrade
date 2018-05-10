<li>
    <div class="tab__title">
        <span class="h5">Terminos</span>
    </div>
    <div class="tab__content">
      <div class="row" style="margin-bottom:45px;">
        <div class="col-md-12">
            <form class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <label>Titulo de Termino:</label>
                    <input type="text" name="name" placeholder="Nombre del Producto o Titulo de la Publicacion" class="validate-required" />
                  </div>
                  <div class="col-md-4">
                    <label>Destacado:</label>
                    <br>
                    <div class="input-checkbox input-checkbox--switch">
                      <input id="checkbox-switch" type="checkbox" name="agree" />
                      <label for="checkbox-switch"></label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label>Orden:</label>
                    <div class="input-number">
                      <input type="number" name="quantity" placeholder="Quantity" value="1" min="1" max="10" />
                      <div class="input-number__controls">
                        <span class="input-number__increase"><i class="stack-up-open"></i></span>
                        <span class="input-number__decrease"><i class="stack-down-open"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-bottom:25px;">
                  <div class="col-md-12">
                    <label>Descripcion:</label>
                    <textarea name="message" placeholder="Descripcion Breve de la Publicacion" class="validate-required" rows="4"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn--primary">Guardar Termino</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="border--round table--alternate-row">
            <legend>Lista de Imagenes en Slider (Carousel)</legend>
            <thead>
              <tr>
                <th>Titulo de Termino</th>
                <th>Texto de Termino</th>
                <th>Destacado</th>
                <th>Orden</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Titulo
                </td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...</td>
                <td>Si</td>
                <td>1</td>
                <td>
                  <a class="btn btn--primary" href="#">
                    <span class="btn__text">Borrar</span>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</li>
