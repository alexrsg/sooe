<h1>Novo Projeto</h1>
<div id="form">
    <div class="block">
        <div>
            <?php echo form_label('Descri��o', 'lblDescricao', 'for="descricao"') ?>
        </div>
        <div>
            <?php echo form_input('descricao', '', 'id="txtDescricaoProjeto"') ?>
        </div>
        <div>
            <div>
                <?php echo form_label('Servi�o', 'lblServico', 'for="city"') ?>
            </div>
            <div class="ui-widget">
                <input id="city" />
            </div>
        </div>
    </div>

    <div id="log-servicos" class="log">
    </div>

    <div id="projeto-servicos" class="block">
        <?php $this->load->view('list'); ?>
    </div>
</div>

<div id="log-projeto" class="log">
</div>

<div>
    <?php echo form_submit('salvar', 'Salvar', 'id="btnSalvarProjeto" class="button"') ?>
</div>