<fieldset>
    <div class="panel">
        <div class="panel-heading">
            <legend>
                <i class="icon-info"></i>
                {l s='Comentarios del producto' mod='micoso'}
            </legend>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3">{l s='ID:' mod='micoso'}</label>
            <div class="col-lg-9">
                {$micoso->id}
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3">{l s='Nombre: ' mod='mymodcomments'}</label>
            <div class="col-lg-9">
                {$micoso->namen}
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3">{l s='E-Mail: ' mod='mymodcomments'}</label>
            <div class="col-lg-9">
                {$micoso->email}
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3">{l s='Producto: ' mod='micoso'}</label>
            <div class="col-lg-9">
                {$micoso->product_name} (#{$micoso->id_product})
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3">{l s='Puntuacion: ' mod='micoso'}</label>
            <div class="col-lg-9">
                {$micoso->grade}/5
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3">{l s='Comentario: ' mod='micoso'}</label>
            <div class="col-lg-9">
                {$micoso->comment|nl2br}
            </div>
        </div>
    </div>
</fieldset>