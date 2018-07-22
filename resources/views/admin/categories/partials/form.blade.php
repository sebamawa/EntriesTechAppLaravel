<div class="form-group">
    {{ Form::label('name', 'Nombre de la categoría (*)') }}
    {{-- null indica que el campo no tendra contenido --}}
    {{ Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL Amigable (*)') }}
    {{ Form::text('slug', null, ['class'=>'form-control', 'id'=>'slug', 'placeholder'=>'Slug']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) }}
</div>
{{-- imagen para la categoria --}}
<div class="form-group">
    {{ Form::label('image_path', 'Imagen') }}
    {{ Form::file('image_path') }}
    <button type="button" id="btn_deseleccionar_img">Deseleccionar</button>
    <img id="image_to_upload" src="#" class="img-thumbnail float-right" width="80px" height="80px">
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class'=>'btn btn-primary']) }}
</div>

@section('scripts')
    <!-- el helper asset() busca en la carpeta public -->
    <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            //codigo para 'slugear' en el campo slug lo contenido en el campo name
            //$("#slug").prop("disabled", true); //deshabilito campo de slug
            $("#name").stringToSlug({
                callback: function(text){
                    $("#slug").val(text);
                }
            });
        });

        //codigo js para visualizar imagen de categoria linkeada para subir al server
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#image_to_upload").attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_path").change(function() {
            readURL(this);
        });

        //codigo para deseleccionar una imagen de categoria linkeada
        $("#btn_deseleccionar_img").click(function(){
            $("#image_path").val("");
            $("#image_to_upload").attr('src', "#");
        });
    </script>
@endsection