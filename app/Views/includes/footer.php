<footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</footer>

<script>
    $(document).ready(function() {
        getUFS()

        function editar() {
            $.post('http://localhost/prova5/teste-pratico/uf', function(data) {
                ufs = JSON.parse(data);
                for (x = 0; x <= data.length; x++) {
                    try {
                        $('#UF').append(`<option value=${ufs[x].id}>${ufs[x].sigla}</option>`);
                    } catch (e) {
                        console.log('')
                    }
                }
            });
        }


        function excluir(id) {
            $.post('http://localhost/prova5/teste-pratico/delete?id=' + id, function(data) {
                $('.modal').modal('hide');
                $('.user-' + id).hide().fadeOut(400);

            });
        }

        function getUFS() {
            $.get('uf', function(data) {
                ufs = JSON.parse(data);

                for (x = 0; x <= data.length; x++) {
                    try {
                        $('#UF').append(`<option>${ufs[x].sigla}</option>`);
                    } catch (e) {

                    }
                }
            });
        }


        function getEstados($uf) {
            $.get('prova5/teste-pratico/uf', function(data) {
                ufs = JSON.parse(data);
                for (x = 0; x = data.length; x++) {
                    try {
                        $('#UF').append(`<options >${ufs[x].sigla}</option>`);
                    } catch (e) {
                        console.log('')
                    }
                }
            });
        }


        function getAddressByCep(cep) {
            $.get('http://viacep.com.br/ws/' + cep + '/json/', function(data) {

                $('#endereco').val(data.logradouro);

            });
        }

        $('#cep').change(function() {
            getAddressByCep($('#cep').val());


        });


        $('.editar').click(function() {
            $('.modal').modal('show');

        });


        $('.delete').click(function() {
            event.preventDefault();
            id = $(this).attr('data-delete')
            $('.modal').modal('show');


            $('.accept').click(function() {
                excluir(id)
            })








        });




    })
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>