<?php
include_once '../tema/assets/componentes/componentes.php';

ob_start();
seo();
$seo_content = ob_get_clean();

?>
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h2>Logs</h2>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-Logs">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-logs">
                                <thead>
                                    <th>Id</th>
                                    <th>Usuário</th>
                                    <th>Ação</th>
                                    <th>Data</th>
                                </thead>
                                <tbody class="relative" id="listaLogs">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).unbind("click").ready(function() {
        ListaLogs();
    });

    function ListaLogs() {

        let tabelaLogs = $('#tabela-logs').DataTable();

        const lista = document.getElementById("listaLogs");

        tabelaLogs.clear().draw();

        lista.innerHTML = `
            <span style="display: block; width: 200px; height: 200px;"></span>
            <div class="loader">Carregando
            <span></span>
            </div>
            `;

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "listaLog"
            },
        }).done(function(data) {
            const conteudos = JSON.parse(data);

            const options = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };

            conteudos.forEach(function(conteudo) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");

                let dataOriginal = new Date(conteudo.dataHoraLogs);

                let dataFormatada = dataOriginal.toLocaleDateString('pt-BR', options);

                linha.innerHTML = `
                        <td>${conteudo.idLogs}</td>
                        <td>${conteudo.nomeUsuario}</td>
                        <td>${conteudo.acaoLogs}</td>
                        <td>${dataFormatada}</td>                        
                    `;

                tabelaLogs.row.add(linha).draw();
            });
        });
    }
</script>