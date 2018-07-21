<div class="form-group">
    {{ Form::label('name', 'Nombre de la categoría') }}
    {{-- null indica que el campo no tendra contenido --}}
    {{ Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL Amigable') }}
    {{ Form::text('slug', null, ['class'=>'form-control', 'id'=>'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class'=>'form-control']) }}
</div>
{{-- imagen para la categoria --}}
<div class="form-group">
    {{ Form::label('image_path', 'Imagen') }}
    {{ Form::file('image_path') }}
    <img id="image_to_upload" src="#" class="float-center" alt="imagen" width="100px" height="100px"> <!-- para previsualizar imagen seleccionada (mas js) -->
</div>
<div class="form-group">
    {{ Form::submit('Guardar') }}
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

            //codigo para visualizar la imagen linkeada en el campo file (https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded)
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_to_upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image_path").change(function() {
                readURL(this);
            });

        });
    </script>
@endsection