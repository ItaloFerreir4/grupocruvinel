<?php 
include_once '../tema/assets/componentes/componentes.php';

echo ''
?>
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-6">
                <h2>Emails</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="body">
                        <div id="div-emails">
                            <div class="table-responsive">
                                <table class="table table-hover table-custom spacing5" id="tabela-emails">
                                    <thead>
                                        <th>Id</th>
                                        <th>Pagina</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                    </thead>
                                    <tbody class="relative" id="listaEmails">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>                        
        </div>
    </div>

    <script defer src="./tema/assets/vendor/ckeditor/ckeditor.js"></script>
    <script defer src="./tema/assets/vendor/toastr/toastr.js"></script>
    <!-- Inclua o Bootstrap JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <!-- Inclua o Bootstrap Multiselect JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script>
        $(document).unbind("click").ready(function () {

            ListaEmails();
        });
    </script>

    <script defer> 

        async function ListaEmails() {

			const lista = document.getElementById("listaEmails");
			let tabela1 = $('#tabela-emails').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            });

			tabela1.clear().draw();

			lista.innerHTML = `
				<span style="display: block; width: 200px; height: 200px;"></span>
				<div class="loader">Carregando
					<span></span>
				</div>
			`;

			try {
				const data = await $.ajax({
					type: "POST",
					url: "backend/carrega-conteudo.php",
					data: {
						origem: "listaEmails"
					},
				});

				const conteudoPagina = JSON.parse(data);

				for (const pagina of conteudoPagina) {
					try {

						const linha = document.createElement("tr");
						linha.classList.add("bg-light");

						linha.innerHTML = `
							<td class="200">${pagina.idEmail}</td>
							<td class="200">${pagina.tituloPagina}</td>
							<td class="200">${pagina.nome}</td>
							<td class="200">${pagina.email}</td>
							<td class="200">${pagina.telefone}</td>
						`;

						tabela1.row.add(linha).draw();
						
					} catch (error) {
						console.error("Erro no loop interno: " + error);
						console.error("Objeto de erro:", verificaDestaqueResponse);
					}
				}

				if (conteudoPagina.length == 0) {
					tabela1.clear().draw();
				}
				
			} catch (error) {
				console.error("Erro na solicitação AJAX principal: " + error);
			}
		}

    </script>
<?php 
'';
?>