<tr>
<td>&nbsp;&nbsp;&nbsp;Tel&eacute;fono fijo:</td>
<td>
<select name="cod_area">
<option></option>
<?php for($i=212; $i<=295; $i++){?>
<option value="<?php echo '0'.$i;?>" <?php if($cod_area==$i){echo 'selected';}?>><?php echo '0'.$i; ?></option>
<?php 

if($i==212){$i=$i+21;}
if(($i==235)||($i==259)||($i==288)){$i=$i+2;}
if(($i==239)||($i==249)||($i==251)||($i==256)||($i==265)||($i==269)||($i==279)){$i=$i+1;}
}?>
</select>

<input type="text" name="telefono" size="6" value="<?php echo $telefono;?>" maxlength="7" onkeypress="return permite(event, 'num')" id="campo9">
</td>
</tr><tr>
<td>&nbsp;&nbsp;&nbsp;Tel&eacute;fono M&oacute;vil:</td>
<td>

<select name="cod_movil">
<option></option>
<?php for($j=412; $j<=426; $j=$j+2){
	
?>
<option value="<?php echo '0'.$j;?>" <?php if($cod_movil==$j){echo 'selected';}?>><?php echo '0'.$j; ?></option>
<?php 

if($j==416){$j=$j+6;}

}?>
</select>

<input type="text" name="movil" size="6" value="<?php echo $movil;?>" maxlength="7" onkeypress="return permite(event, 'num')" id="movil">

</td>
</tr>