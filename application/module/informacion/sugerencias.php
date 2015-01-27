
<?php

$title = "SUGERENCIAS";
$subtitle1 = htmlentities("Comentarios, dudas o sugerencias");
$text1 = htmlentities("Puedes contactar con nosotros siempre que lo desees para hacernos llegar tus sugerencias o preguntas.");
$text2 = htmlentities("Respecto a atender consultas, te informamos que PluralPet es, por el momento, una
web divulgativa, no podemos atender consultas que requieran la valoración de 
profesionales como veterinarios, criadores, etc.");



?>


<style>
    input,textarea{
        margin:5px;
        width:300px;
    }
    td{
        font-weight:bold;
    }
</style>


<div class="informacion">
    <h3><?php echo $title; ?></h3>
    <h5><?php echo $subtitle1; ?></h5>
    <p><?php echo $text1; ?></p>
    <p><?php echo $text2; ?></p>
    <form>
        <table>
            <tr>
                <td>Tu nombre</td>
                <td>
                    <input type="text" value=""/>
                </td>
            </tr>
            <tr>
                <td>Tu email</td>
                <td>
                    <input type="text" value=""/>
                </td>
            </tr>
            <tr>
                <td>Text de la consulta</td>
                <td>
                    <textarea></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button style="margin-left:5px;" class="button">Enviar</button>
                </td>
            </tr>
        </table>
    </form>
</div>