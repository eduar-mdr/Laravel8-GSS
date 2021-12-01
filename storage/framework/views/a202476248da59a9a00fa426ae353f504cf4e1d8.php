<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <?php echo e(Form::label('Categoria')); ?>

            <?php echo e(Form::select('cat', array('Unisex' => 'Unisex', 'Damas' => 'Damas', 'Caballeros' => 'Caballeros'),  $promotion->cat, ['class' => 'form-control' . ($errors->has('cat') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una categoria'])); ?>

            <?php echo $errors->first('cat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status')); ?>

            <?php echo e(Form::select('status', array('0' => 'No Disponible', '1' => 'Disponible'), $promotion->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el estado'])); ?>

            <?php echo $errors->first('status', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('Nombre')); ?>

            <?php echo e(Form::text('name', $promotion->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre'])); ?>

            <?php echo $errors->first('name', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('Descripción')); ?>

            <?php echo e(Form::textarea ('description', $promotion->description, ['class' => 'form-control' ,'rows' => '3' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripción'])); ?>

            <?php echo $errors->first('description', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('Precio')); ?>

            <?php echo e(Form::number('price', $promotion->price, ['class' => 'form-control', 'min' => '1' , 'max' => '100', 'step' => '0.01'. ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Precio'])); ?>

            <?php echo $errors->first('price', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

        <!-- Previsualizacion de image -->
        <div class="mb-3">
            <img id="imagenSeleccionada" style="max-height: 300px;">    
        </div>

        <div class="form-group">
            <?php echo e(Form::label('image')); ?>

            <?php echo e(Form::file('image' ,['class' => 'form-control' , 'id' => 'image'. ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image'])); ?>

            <?php echo $errors->first('image', '<div class="invalid-feedback">:message</p>'); ?>

        </div>


    </div>
    <div class="box-footer mt20">
        <a  onClick="javascript:window.close('','_parent','');" class="btn btn-danger" >Cancelar</a>
        <button type="submit" class="btn btn-primary" onClick="close_win()">Crear</button>
    </div>
</div>

<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#image').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });

    var time;

    function close_win() {
        time = setTimeout(timeFunc, 1000);
        }

        function timeFunc() {
            window.close('','_parent','');
    }

</script><?php /**PATH C:\xampp\htdocs\Laravel\proLar02\resources\views/promotion/formc.blade.php ENDPATH**/ ?>