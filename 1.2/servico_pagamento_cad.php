<table width="100%" border="0" class="tabela_lista">
<tr>
<td colspan="6" align="center" class="tabela_titulo">Parcelas</td>
  </tr>
  <tr>
    <td width="13%" class="tabela_label">Nr Parcela:</td>
    <td colspan="5" class="tabela_linha"><input name="nr_parcela_<?php echo $nr_parcela; ?>" type="text" id="nr_parcela_<?php echo $nr_parcela; ?>" size="10" maxlength="3" value="<?php echo $nr_parcela; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Banco:</td>
    <td width="25%" class="tabela_linha"><input name="ds_banco_<?php echo $nr_parcela; ?>" type="text" id="ds_banco_<?php echo $nr_parcela; ?>" size="20" maxlength="200" value="<?php if (isset($$ds_banco)) echo $$ds_banco; ?>"></td>
    <td width="11%" class="tabela_label">Agencia:</td>
    <td width="19%" class="tabela_linha"><input name="ds_agencia_<?php echo $nr_parcela; ?>" type="text" id="ds_agencia_<?php echo $nr_parcela; ?>" size="15" maxlength="200" value="<?php if (isset($$ds_agencia)) echo $$ds_agencia; ?>"></td>
    <td width="13%" class="tabela_label">Nr. Cheque:</td>
    <td width="19%" class="tabela_linha"><input name="nr_cheque_<?php echo $nr_parcela; ?>" type="text" id="nr_cheque_<?php echo $nr_parcela; ?>" size="15" maxlength="20" value="<?php if (isset($$nr_cheque)) echo $$nr_cheque; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Data Parcela:</td>
    <td class="tabela_linha"><input name="dt_parcela_<?php echo $nr_parcela; ?>" type="text" id="dt_parcela_<?php echo $nr_parcela; ?>" size="12" maxlength="12" value="<?php if (isset($$dt_parcela)) echo $$dt_parcela; ?>"></td>
    <td class="tabela_label">Valor Parcela:</td>
    <td colspan="3" class="tabela_linha"><input name="vl_parcela_<?php echo $nr_parcela; ?>" type="text" id="vl_parcela_<?php echo $nr_parcela; ?>" size="12" maxlength="12" value="<?php if (isset($$vl_parcela)) echo formata_numero_mostrar($$vl_parcela); ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Data Pagamento:</td>
    <td colspan="5" class="tabela_linha"><input name="dt_pagamento_<?php echo $nr_parcela; ?>" type="text" id="dt_pagamento_<?php echo $nr_parcela; ?>" size="12" maxlength="12" value="<?php if (isset($$dt_pagamento)) echo $$dt_pagamento; ?>"></td>
  </tr>
</table>