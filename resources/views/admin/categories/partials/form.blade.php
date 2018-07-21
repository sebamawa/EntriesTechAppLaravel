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
    {{ Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) }}
</div>
{{-- imagen para la categoria --}}
<div class="form-group">
    {{ Form::label('image_path', 'Imagen') }}
    {{ Form::file('image_path') }}
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
    </script>
@endsection